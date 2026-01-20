<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prestamo extends Model
{
    /** @use HasFactory<\Database\Factories\PrestamoFactory> */
    use HasFactory;

    protected $fillable = ['fecha_prestamo', 'fecha_devolucion', 'estado'];


    public function book():BelongsTo{
        return $this->belongsTo(Book::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
