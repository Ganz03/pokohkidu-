<?php
// app/Models/LembagaDesa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LembagaDesa extends Model
{
    use HasFactory;

    protected $table = 'lembaga_desa';

    protected $fillable = [
        'nama_lembaga',
        'slug',
        'singkatan',
        'dasar_hukum',
        'alamat_kantor',
        'profil',
        'visi',
        'misi',
        'tugas_pokok_fungsi',
        'hak',
        'kewajiban',
        'tugas_wewenang',
        'logo_path',
        'foto_kantor_path',
        'is_active',
        'urutan_tampil',
        'galeri_foto'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'galeri_foto' => 'array'
    ];

    // Boot method untuk auto generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lembaga) {
            if (empty($lembaga->slug)) {
                $lembaga->slug = Str::slug($lembaga->nama_lembaga);
            }
        });

        static::updating(function ($lembaga) {
            if ($lembaga->isDirty('nama_lembaga')) {
                $lembaga->slug = Str::slug($lembaga->nama_lembaga);
            }
        });
    }

    // Relationships
    public function pengurus()
    {
        return $this->hasMany(PengurusLembaga::class)->orderBy('urutan_tampil');
    }

    public function pengurusAktif()
    {
        return $this->hasMany(PengurusLembaga::class)->where('is_active', true)->orderBy('urutan_tampil');
    }

    // Scopes
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUrutanTampil($query)
    {
        return $query->orderBy('urutan_tampil');
    }

    // Accessors
    public function getLogoUrlAttribute()
    {
        return $this->logo_path ? Storage::url($this->logo_path) : null;
    }

    public function getFotoKantorUrlAttribute()
    {
        return $this->foto_kantor_path ? Storage::url($this->foto_kantor_path) : null;
    }

    public function getGaleriFotoUrlsAttribute()
    {
        if (!$this->galeri_foto) {
            return [];
        }

        return collect($this->galeri_foto)->map(function ($path) {
            return Storage::url($path);
        })->toArray();
    }

    // Route key binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Helper methods
    public function getTotalPengurusAttribute()
    {
        return $this->pengurus()->count();
    }

    public function getTotalPengurusAktifAttribute()
    {
        return $this->pengurusAktif()->count();
    }
}