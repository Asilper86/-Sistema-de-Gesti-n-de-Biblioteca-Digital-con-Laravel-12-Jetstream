<?php

namespace App\Livewire\Categorias;

use App\Livewire\Forms\Categorias\crearCategoriaForm;
use Livewire\Component;

class CrearCategorias extends Component
{
    public bool $openCrear = false;
    public crearCategoriaForm $cform;
    public function render()
    {
        return view('livewire.categorias.crear-categorias');
    }

    public function guardarCategoria(){
        $this->cform->crearCategoriaForm();
        $this->cancelarCategoria();
        $this->dispatch('evtCategoriaCreada')->to(MostrarCategorias::class);
        $this->dispatch('mensaje', 'Categoria Creada');
    }

    public function cancelarCategoria(){
        $this->cform->cancelarCategoriaForm();
        $this->openCrear=false;
    }
}
