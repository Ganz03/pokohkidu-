<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'year',
        'is_active',
        'views'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'views' => 'integer',
        'year' => 'integer'
    ];

    // Automatically generate slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($map) {
            if (empty($map->slug)) {
                $map->slug = static::generateUniqueSlug($map->title);
            }
        });
        
        static::updating(function ($map) {
            if ($map->isDirty('title') && empty($map->getOriginal('slug'))) {
                $map->slug = static::generateUniqueSlug($map->title);
            }
        });
    }

    private static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = static::where('slug', 'like', $slug . '%')->count();
        
        return $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/default-map.png');
    }

    // Increment views
    public function incrementViews()
    {
        $this->increment('views');
    }

    // Get recent maps
    public function getRecentMaps($limit = 6)
    {
        return static::where('id', '!=', $this->id)
                    ->active()
                    ->latest()
                    ->limit($limit)
                    ->get();
    }
}