<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fungsionaris extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nama_fungsionaris',
        'photo_path',
        'jabatan_id',
        'kementerian_id',
    ];

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class);
    }
}
