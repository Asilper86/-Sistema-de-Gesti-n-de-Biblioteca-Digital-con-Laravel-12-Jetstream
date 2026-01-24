<?php

namespace App\Livewire\Forms\Categorias;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditarCategoriaForm extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:100'])]
    public string $nombre = "";
    #[Validate(['required', 'string', 'min:10', 'max:500'])]
    public string $descripcion = "";

    public ?Category $category = null;

    public function setCategory(Category $category){
        $this->category=$category;
        $this->nombre=$category->nombre;
        $this->descripcion=$category->descripcion;
    }

    public function editarCategoriaForm(){
        $this->validate();
        $this->category->update($this->all());
    }

    public function cancelarCategoriaForm(){
        $this->resetValidation();
        $this->reset();
    }
}
