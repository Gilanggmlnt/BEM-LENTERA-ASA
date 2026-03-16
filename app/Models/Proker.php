<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'kementerian_id',
        'nama_proker',
        'slug',
        'nama_ketuplak',
        'deskripsi_proker',
        'pamflet',
        'tanggal_pelaksanaan',
        'dokumentasi',
    ];

    public function kementerian()
    {
        return $this->belongsTo(Kementerian::class);
    }

    /**
     * Get dokumentasi as an array.
     */
    public function getDokumentasiArrayAttribute()
    {
        if (!$this->dokumentasi) return [];
        return array_map('trim', explode(',', $this->dokumentasi));
    }
}
