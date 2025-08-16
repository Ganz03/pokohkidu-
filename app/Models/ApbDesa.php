<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApbDesa extends Model
{
    use HasFactory;

    protected $table = 'apb_desa';

    protected $fillable = [
        'judul',
        'slug',
        'foto',
        'excerpt',
        'tahun',
        'tanggal_publikasi',
        
        // Pendapatan Asli Desa
        'pad_hasil_usaha_rencana',
        'pad_hasil_usaha_realisasi',
        'pad_hasil_aset_rencana',
        'pad_hasil_aset_realisasi',
        'pad_swadaya_rencana',
        'pad_swadaya_realisasi',
        
        // Pendapatan Transfer
        'transfer_dana_desa_rencana',
        'transfer_dana_desa_realisasi',
        'transfer_bagi_hasil_rencana',
        'transfer_bagi_hasil_realisasi',
        'transfer_alokasi_dana_rencana',
        'transfer_alokasi_dana_realisasi',
        'transfer_bantuan_kab_rencana',
        'transfer_bantuan_kab_realisasi',
        'transfer_bantuan_prov_rencana',
        'transfer_bantuan_prov_realisasi',
        
        // Pendapatan Lain-lain
        'lain_hibah_rencana',
        'lain_hibah_realisasi',
        'lain_sumbangan_rencana',
        'lain_sumbangan_realisasi',
        'lain_pendapatan_rencana',
        'lain_pendapatan_realisasi',
        
        // Belanja Desa
        'belanja_pemerintahan_rencana',
        'belanja_pemerintahan_realisasi',
        'belanja_pembangunan_rencana',
        'belanja_pembangunan_realisasi',
        'belanja_kemasyarakatan_rencana',
        'belanja_kemasyarakatan_realisasi',
        'belanja_pemberdayaan_rencana',
        'belanja_pemberdayaan_realisasi',
        'belanja_tak_terduga_rencana',
        'belanja_tak_terduga_realisasi',
        
        // Pembiayaan Desa
        'penerimaan_silpa_rencana',
        'penerimaan_silpa_realisasi',
        'penerimaan_dana_cadangan_rencana',
        'penerimaan_dana_cadangan_realisasi',
        'penerimaan_hasil_penjualan_rencana',
        'penerimaan_hasil_penjualan_realisasi',
        'pengeluaran_dana_cadangan_rencana',
        'pengeluaran_dana_cadangan_realisasi',
        'pengeluaran_modal_desa_rencana',
        'pengeluaran_modal_desa_realisasi',
        
        'is_published',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
        'is_published' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->judul);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('judul') && empty($model->getOriginal('slug'))) {
                $model->slug = Str::slug($model->judul);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('tahun', $year);
    }

    // Helper methods untuk perhitungan
    public function getTotalPendapatanRencanaAttribute()
    {
        return $this->pad_hasil_usaha_rencana + $this->pad_hasil_aset_rencana + $this->pad_swadaya_rencana +
               $this->transfer_dana_desa_rencana + $this->transfer_bagi_hasil_rencana + $this->transfer_alokasi_dana_rencana +
               $this->transfer_bantuan_kab_rencana + $this->transfer_bantuan_prov_rencana +
               $this->lain_hibah_rencana + $this->lain_sumbangan_rencana + $this->lain_pendapatan_rencana;
    }

    public function getTotalPendapatanRealisasiAttribute()
    {
        return $this->pad_hasil_usaha_realisasi + $this->pad_hasil_aset_realisasi + $this->pad_swadaya_realisasi +
               $this->transfer_dana_desa_realisasi + $this->transfer_bagi_hasil_realisasi + $this->transfer_alokasi_dana_realisasi +
               $this->transfer_bantuan_kab_realisasi + $this->transfer_bantuan_prov_realisasi +
               $this->lain_hibah_realisasi + $this->lain_sumbangan_realisasi + $this->lain_pendapatan_realisasi;
    }

    public function getTotalBelanjaRencanaAttribute()
    {
        return $this->belanja_pemerintahan_rencana + $this->belanja_pembangunan_rencana + $this->belanja_kemasyarakatan_rencana +
               $this->belanja_pemberdayaan_rencana + $this->belanja_tak_terduga_rencana;
    }

    public function getTotalBelanjaRealisasiAttribute()
    {
        return $this->belanja_pemerintahan_realisasi + $this->belanja_pembangunan_realisasi + $this->belanja_kemasyarakatan_realisasi +
               $this->belanja_pemberdayaan_realisasi + $this->belanja_tak_terduga_realisasi;
    }

    public function formatRupiah($amount)
    {
        return 'Rp. ' . number_format($amount, 0, ',', '.');
    }
}