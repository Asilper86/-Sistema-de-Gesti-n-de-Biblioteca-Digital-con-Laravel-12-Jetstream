<?php

namespace App\Livewire\Autores;

use App\Livewire\Forms\Autores\CrearAutoresForm;
use Livewire\Component;

class CrearAutores extends Component
{
    public bool $openCrear = false;
    public CrearAutoresForm $cform;
    public function render()
    {
        return view('livewire.autores.crear-autores');
    }

    public function crearAutor(){
        $this->cform->crearAutorForm();
        $this->dispatch('evtCreadoAutor')->to(MostrarAutores::class);
        $this->dispatch('mensaje', 'Autor Creado');
        $this->cancelar();
    }

    public function cancelar(){
        $this->cform->cancelarAutorForm();
        $this->openCrear=false;
    }
}
