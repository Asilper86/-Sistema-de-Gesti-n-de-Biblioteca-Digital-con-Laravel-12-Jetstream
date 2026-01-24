<?php

use App\Livewire\Autores\MostrarAutores;
use App\Livewire\Categorias\MostrarCategorias;
use App\Models\Book;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $librosOcupados = Prestamo::where('estado', 'activo')->pluck('book_id');
    $libros = Book::whereNotIn('id', $librosOcupados)->paginate(5);
    return view('welcome', compact('libros'));
})->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('autores', MostrarAutores::class)->name('autores');
    Route::get('categories', MostrarCategorias::class)->name('categorias');

});
