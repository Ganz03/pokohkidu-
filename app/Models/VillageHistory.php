<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB; // <- TAMBAHKAN IMPORT INI

class VillageHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'introduction',
        'origin_story',
        'pki_rebellion',
        'reservoir_impact',
        'government_history',
        'cultural_heritage',
        'author',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get the active village history
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Set this village history as active and deactivate others
     */
    public function setAsActive()
    {
        // Start transaction to ensure data consistency
        DB::transaction(function () { // <- SEKARANG BISA MENGGUNAKAN DB::transaction()
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
                throw new \Exception('Cannot delete the only active village history. Please activate another one first.');
            }
        });
    }

    /**
     * Get formatted content for display
     */
    public function getFormattedContentAttribute()
    {
        return [
            'introduction' => strip_tags($this->introduction),
            'origin_story' => strip_tags($this->origin_story),
            'pki_rebellion' => strip_tags($this->pki_rebellion),
            'reservoir_impact' => strip_tags($this->reservoir_impact),
            'government_history' => strip_tags($this->government_history),
            'cultural_heritage' => strip_tags($this->cultural_heritage),
        ];
    }
}