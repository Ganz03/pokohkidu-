<?php
// app/Models/OrganizationPosition.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrganizationPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_name',
        'slug',
        'person_name',
        'photo_path',
        'duties',
        'authorities',
        'rights',
        'obligations',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->position_name);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('position_name')) {
                $model->slug = Str::slug($model->position_name);
            }
        });
    }

    public function getPhotoUrlAttribute()
    {
        return $this->photo_path ? Storage::url($this->photo_path) : null;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}