<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotensiDesa extends Model
{
    use HasFactory;

    protected $table = 'potensi_desa';

    protected $fillable = [
        'tahun',
        'jumlah_penduduk_laki',
        'jumlah_penduduk_perempuan',
        'jumlah_kepala_keluarga',
        'kepadatan_penduduk',
        'luas_wilayah',
        'batas_wilayah_utara',
        'batas_wilayah_selatan',
        'batas_wilayah_timur',
        'batas_wilayah_barat',
        'orbitasi_desa',
        'jenis_lahan',
        'potensi_wisata',
        'kantor_desa',
        'lembaga_pemerintahan',
        'sarana_prasarana_pkk',
        'sarana_prasarana_pendidikan',
        'sarana_prasarana_peribadatan',
        'sarana_prasarana_kesehatan',
        'sarana_prasarana_air_bersih',
        'sarana_prasarana_irigasi',
        'is_active',
    ];

    protected $casts = [
        'jenis_lahan' => 'array',
        'lembaga_pemerintahan' => 'array',
        'sarana_prasarana_pkk' => 'array',
        'sarana_prasarana_pendidikan' => 'array',
        'sarana_prasarana_peribadatan' => 'array',
        'sarana_prasarana_kesehatan' => 'array',
        'sarana_prasarana_air_bersih' => 'array',
        'sarana_prasarana_irigasi' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('tahun', $year);
    }

    public function getTotalPendudukAttribute()
    {
        return $this->jumlah_penduduk_laki + $this->jumlah_penduduk_perempuan;
    }

    public function getPersentaseLakiAttribute()
    {
        if ($this->total_penduduk == 0) return 0;
        return round(($this->jumlah_penduduk_laki / $this->total_penduduk) * 100, 1);
    }

    public function getPersentasePerempuanAttribute()
    {
        if ($this->total_penduduk == 0) return 0;
        return round(($this->jumlah_penduduk_perempuan / $this->total_penduduk) * 100, 1);
    }

    public function formatNumber($number)
    {
        return number_format($number, 0, ',', '.');
    }
}