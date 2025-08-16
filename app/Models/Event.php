<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'location',
        'event_date',
        'end_date',
        'status',
        'organizer',
        'views',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });

        static::updating(function ($event) {
            if ($event->isDirty('title') && empty($event->getOriginal('slug'))) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>', now())
                    ->where('status', 'scheduled');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'scheduled' => 'Terjadwal',
            'ongoing' => 'Berlangsung',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan',
            default => 'Unknown'
        };
    }
}