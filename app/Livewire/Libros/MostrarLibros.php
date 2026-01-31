<?php

namespace App\Livewire\Libros;

use App\Livewire\Forms\Libros\UpdateLibrosForm;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarLibros extends Component
{
    public string $orden = 'desc';

    public string $campo = 'id';

    public string $buscar = '';

    public UpdateLibrosForm $uform;

    public bool $openEditar = false;

    public Book $book;

    #[On('evtLibroCreado')]
    public function render()
    {
        $libros = Book::with(['category', 'author'])
            ->where(function ($q) {
                $q->where('titulo', 'like', "%{$this->buscar}%")
                    ->orWhere('editorial', 'like', "%{$this->buscar}%")
                    ->orWhereHas('category', function ($query) {
                        $query->where('nombre', 'like', "%{$this->buscar}%");
                    })
                    ->orWhereHas('author', function ($query) {
                        $query->where('nombre', 'like', "%{$this->buscar}%");
                    });
            })
            ->orderBy($this->campo, $this->orden)
            ->paginate(10);

        $autores = Author::orderBy('nombre')->get();
        $categorias = Category::orderBy('nombre')->get();

        return view('livewire.libros.mostrar-libros', compact('libros', 'autores','categorias'));
    }

    public function ordenar(string $campo)
    {
        $this->orden = ($this->orden == 'desc') ? 'asc' : 'desc';
        $this->campo = $campo;
    }

    /* METODOS ELIMINAR LIBROS */
    public function lanzarAlerta(Book $book)
    {
        $this->book = $book;
        $this->dispatch('evtBorrarLibro', destino: 'libros.mostrar-libros');
    }

    #[On('evtBorrarOk')]
    public function borrarLibro()
    {
        $portada = $this->book->portada;
        $this->book->delete();
        if (basename($portada) != 'noImage.jpg') {
            Storage::delete($portada);
        }
        $this->reset('book');

    }

    /* METODOS EDITAR */
    public function editar(Book $book)
    {
        $this->uform->setLibros($book);
        $this->openEditar = true;
    }

    public function update() {
        $this->uform->editarLibroForm();
        $this->dispatch('mensaje', 'Libro Editado');
        $this->cancelar();
    }

    public function cancelar() {
        $this->uform->cancelarLibrosForm();
        $this->openEditar=false;
    }
}
