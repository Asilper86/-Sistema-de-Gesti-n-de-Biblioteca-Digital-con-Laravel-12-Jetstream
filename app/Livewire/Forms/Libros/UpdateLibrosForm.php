<?php

namespace App\Livewire\Forms\Libros;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class UpdateLibrosForm extends Form
{
    public string $titulo = "";
    #[Validate(['required', 'integer'])]
    public int $año_publicacion = 0;
    #[Validate(['required', 'string'])]
    public string $editorial = "";

    #[Validate(['required', 'integer', 'min:100', 'max:1000'])]
    public int $num_paginas = 0;

    #[Validate(['nullable', 'image', 'max:2048'])]
    public ?TemporaryUploadedFile $portada = null;
    #[Validate('required', 'integer')]
    public ?int $author_id = null;
    #[Validate(['required', 'integer', 'exists:categories,id'])] 
    public ?int $category_id = null;

    public ?Book $book = null;


    public function rules():array{
        $book = $this->book?->id;
        return [
            'titulo'=>['required', 'string', 'min:3', 'max:250', 'unique:books,titulo,'.$book]
        ];
    }

    public function setLibros(Book $book){
        $this->book=$book;
        $this->titulo=$book->titulo;
        $this->año_publicacion=$book->año_publicacion;
        $this->editorial=$book->editorial;
        $this->num_paginas=$book->num_paginas;
        $this->author_id=$book->author_id;
        $this->category_id=$book->category_id;
    }

    public function editarLibroForm(){
        $datos = $this->validate();
        $datos['portada']=$this->portada?->store('images/books') ?? $this->book->portada;
        $imagenLibro = $this->book->portada;
        $this->book->update($datos);
        if($this->portada && basename($imagenLibro) != 'noImage.jpg'){
            Storage::delete($imagenLibro);
        }
    }

    public function cancelarLibrosForm(){
        $this->resetValidation();
        $this->reset();
    }
}
