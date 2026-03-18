<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'category', 'image', 'excerpt', 'description', 'date'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->title);
            }
        });
    }
}
