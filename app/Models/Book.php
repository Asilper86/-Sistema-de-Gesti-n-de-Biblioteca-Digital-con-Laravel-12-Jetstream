<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo', 
        'año_publicacion', 
        'editorial', 
        'num_paginas', 
        'portada', 
        'author_id',
        'category_id', 
    ];
    public function author():BelongsTo{
        return $this->belongsTo(Author::class);
    }

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function prestamos():HasMany{
        return $this->hasMany(Prestamo::class);
    }
}
