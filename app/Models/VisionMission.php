<?php
// File: app/Models/VisionMission.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class VisionMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'vision_title',
        'vision_content',
        'mission_title',
        'mission_content',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get the active vision mission
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Set this vision mission as active and deactivate others
     */
    public function setAsActive()
    {
        // Start transaction to ensure data consistency
        DB::transaction(function () {
            // Deactivate all others
            self::where('id', '!=', $this->id)->update(['is_active' => false]);
            
            // Activate this one
            $this->update(['is_active' => true]);
        });

        return $this;
    }

    /**
     * Scope to get only active records
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get inactive records
     */
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('is_active', false);
    }

    /**
     * Boot method to handle model events
     */
    protected static function boot()
    {
        parent::boot();

        // Ensure only one active record at a time
        static::saving(function ($model) {
            if ($model->is_active) {
                // Deactivate all other records
                static::where('id', '!=', $model->id)
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
            }
        });

        // Prevent deletion of the last active record
        static::deleting(function ($model) {
            if ($model->is_active && static::where('is_active', true)->count() === 1) {
                throw new \Exception('Cannot delete the only active vision mission. Please activate another one first.');
            }
        });
    }
}