<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kementerian extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nama_kementerian', 'deskripsi', 'logo'];

    public function prokers()
    {
        return $this->hasMany(Proker::class);
    }
}
