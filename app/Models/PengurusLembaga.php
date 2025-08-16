<?php
// app/Models/PengurusLembaga.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PengurusLembaga extends Model
{
    use HasFactory;

    protected $table = 'pengurus_lembaga';

    protected $fillable = [
        'lembaga_desa_id',
        'nama',
        'jabatan',
        'pendidikan',
        'nip',
        'tanggal_mulai_jabatan',
        'tanggal_berakhir_jabatan',
        'foto_path',
        'biodata',
        'is_active',
        'urutan_tampil'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tanggal_mulai_jabatan' => 'date',
        'tanggal_berakhir_jabatan' => 'date'
    ];

    // Relationships
    public function lembaga()
    {
        return $this->belongsTo(LembagaDesa::class, 'lembaga_desa_id');
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
    public function getFotoUrlAttribute()
    {
        return $this->foto_path ? Storage::url($this->foto_path) : null;
    }

    public function getLamaJabatanAttribute()
    {
        if (!$this->tanggal_mulai_jabatan) {
            return null;
        }

        $mulai = Carbon::parse($this->tanggal_mulai_jabatan);
        $akhir = $this->tanggal_berakhir_jabatan 
            ? Carbon::parse($this->tanggal_berakhir_jabatan) 
            : Carbon::now();

        $diff = $mulai->diff($akhir);
        
        $years = $diff->y;
        $months = $diff->m;
        
        if ($years > 0 && $months > 0) {
            return "{$years} tahun {$months} bulan";
        } elseif ($years > 0) {
            return "{$years} tahun";
        } elseif ($months > 0) {
            return "{$months} bulan";
        } else {
            return "Kurang dari 1 bulan";
        }
    }

    public function getStatusJabatanAttribute()
    {
        if (!$this->is_active) {
            return 'Tidak Aktif';
        }

        if ($this->tanggal_berakhir_jabatan && Carbon::now()->gt($this->tanggal_berakhir_jabatan)) {
            return 'Masa Jabatan Berakhir';
        }

        return 'Aktif';
    }
}