<?php

use App\Livewire\Autores\MostrarAutores;
use App\Livewire\Categorias\MostrarCategorias;
use App\Livewire\Libros\MostrarLibros;
use App\Livewire\Prestamos\MostrarPrestamos;
use App\Models\Book;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $librosOcupados = Prestamo::where('estado', 'activo')->pluck('book_id');
    $libros = Book::whereNotIn('id', $librosOcupados)->paginate(5);
    return view('welcome', compact('libros'));
})->name('inicio');

Route::get('prestamos', MostrarPrestamos::class)->name('prestamos');

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
    Route::get('books', MostrarLibros::class)->name('libros');

});
