<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'kementerian_id',
        'nama_agenda',
        'pelaksanaan_agenda',
        'deskripsi_agenda',
    ];

    public function kementerian()
    {
        return $this->belongsTo(Kementerian::class);
    }
}
