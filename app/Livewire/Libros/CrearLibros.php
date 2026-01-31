<?php

namespace App\Livewire\Libros;

use App\Livewire\Forms\Libros\CreateLibrosForm;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearLibros extends Component
{
    use WithFileUploads;
    public bool $openCrear = false;
    public CreateLibrosForm $cform;
    public Book $libro;
    public function render()
    {
        $libros = Book::orderBy('titulo', 'asc')->get();
        $autores = Author::orderBy('nombre', 'asc')->get();
        $categorias = Category::orderBy('nombre', 'asc')->get();
        return view('livewire.libros.crear-libros', compact('autores', 'categorias', 'libros'));
    }

    public function crearLibro(){
        $this->cform->crearLibroForm();
        $this->dispatch('mensaje', 'Libro Añadido');
        $this->dispatch('evtLibroCreado')->to(MostrarLibros::class);
        $this->cancelarLibro();
    }

    public function cancelarLibro(){
        $this->cform->cancelarLibrosForm();
        $this->openCrear=false;
    }
}
