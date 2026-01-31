<?php

namespace App\Livewire\Forms\Libros;

use App\Models\Book;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class CreateLibrosForm extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:250', 'unique:books,titulo'])]
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

    public function crearLibroForm(){
        $datos = $this->validate();
        $datos['portada']=$this->portada?->store('images/books') ?? 'images/books/noImage.jpg';
        Book::create($datos);
        $this->reset();
    }

    public function cancelarLibrosForm(){
        $this->resetValidation();
        $this->reset();
    }
}
