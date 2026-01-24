<?php

namespace App\Livewire\Forms\Categorias;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class crearCategoriaForm extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:100'])]
    public string $nombre = "";
    #[Validate(['required', 'string', 'min:10', 'max:500'])]
    public string $descripcion = "";

    public function crearCategoriaForm(){
        $this->validate();
        Category::create($this->all());
    }

    public function cancelarCategoriaForm(){
        $this->resetValidation();
        $this->reset();
    }
}
