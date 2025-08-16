<?php
// app/Models/PerangkatDesa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jabatan',
        'slug',
        'nama_pejabat',
        'foto_path',
        'tugas_fungsi',
        'wewenang',
        'hak',
        'kewajiban',
        'nip',
        'pendidikan',
        'tanggal_mulai_jabatan',
        'urutan_tampil',
        'is_aktif'
    ];

    protected $casts = [
        'is_aktif' => 'boolean',
        'tanggal_mulai_jabatan' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->nama_jabatan);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('nama_jabatan')) {
                $model->slug = Str::slug($model->nama_jabatan);
            }
        });
    }

    public function getFotoUrlAttribute()
    {
        return $this->foto_path ? Storage::url($this->foto_path) : null;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeAktif($query)
    {
        return $query->where('is_aktif', true);
    }

    public function getLamaJabatanAttribute()
    {
        if (!$this->tanggal_mulai_jabatan) {
            return null;
        }
        
        return $this->tanggal_mulai_jabatan->diffForHumans(now(), true);
    }
}