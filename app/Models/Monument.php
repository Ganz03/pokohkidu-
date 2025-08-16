<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // ← Tambahkan import ini

class Monument extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'image',
        'history',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public static function getFeatured()
    {
        return static::where('is_featured', true)->where('is_active', true)->first();
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Method 1: Menggunakan asset dengan storage path
            return asset('storage/' . $this->image);
            
            // Method 2: Alternative jika method 1 tidak work
            // return url('storage/' . $this->image);
        }
        return asset('images/default-monument.png');
    }

    // Alternative method tanpa accessor (jika lebih prefer)
    public function getImageUrl()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/default-monument.png');
    }

    // Method untuk mendapatkan full path storage
    public function getImagePath()
    {
        if ($this->image) {
            return storage_path('app/public/' . $this->image);
        }
        return null;
    }

    // Method untuk cek apakah monument memiliki gambar
    public function hasImage()
    {
        return !empty($this->image) && Storage::disk('public')->exists($this->image);
    }

    // Scope untuk monument yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk monument yang featured
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}