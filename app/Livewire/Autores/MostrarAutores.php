<?php

namespace App\Livewire\Autores;

use App\Livewire\Forms\Autores\EditarAutoresForm;
use App\Models\Author;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarAutores extends Component
{
    public string $campo = "id";
    public string $orden = "desc";

    public Author $author;

    public EditarAutoresForm $uform;

    public bool $openEditar = false;

    #[On('evtCreadoAutor')]
    public function render()
    {
        $autores = Author::orderBy($this->campo, $this->orden)->paginate(10);
        return view('livewire.autores.mostrar-autores', compact('autores'));
    }

    public function ordenar(string $campo){
        $this->orden = ($this->orden == "desc") ? "asc" : "desc";
        $this->campo = $campo;
    }

    /* METODOS ELIMINAR AUTOR */
    public function lanzarAlerta(Author $author){
        $this->author=$author;
        $this->dispatch('evtBorrarAutor', destino: 'autores.mostrar-autores');
    }

    #[On('evtBorrarOk')]
    public function borrar(){
        $this->author->delete();
        $this->dispatch('mensaje', 'Autor Eliminado');
    }

    /* METODOS EDITAR */

    public function editar(Author $author){
        $this->uform->setAutores($author);
        $this->openEditar=true;
    }

    public function update(){
        $this->uform->editarAutorForm();
        $this->cancelarEditar();
        $this->dispatch('mensaje', 'Autor Editado');
    }

    public function cancelarEditar(){
        $this->uform->cancelarAutorForm();
        $this->reset();
    }

    


}
