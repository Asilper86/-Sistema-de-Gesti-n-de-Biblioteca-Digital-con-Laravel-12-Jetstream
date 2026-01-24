<?php

namespace App\Livewire\Categorias;

use App\Livewire\Forms\Autores\EditarAutoresForm;
use App\Livewire\Forms\Categorias\EditarCategoriaForm;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarCategorias extends Component
{
    public string $campo="id";
    public string $orden = "asc";

    public bool $openEditar = false;
    public EditarCategoriaForm $uform;
    public Category $category;

    #[On('evtCategoriaCreada')]
    public function render()
    {
        $categorias = Category::orderBy($this->campo, $this->orden)->get();
        return view('livewire.categorias.mostrar-categorias', compact('categorias'));
    }

    public function ordenar(string $campo){
        $this->orden = ($this->orden == "desc") ? "asc" : "desc";
        $this->campo=$campo;
    }

    /* METODOS ELIMINAR CATEGORIAS */
    public function lanzarAlerta(Category $category){
        $this->category=$category;
        $this->dispatch('evtBorrarCategoria', destino: 'categorias.crear-categorias');
    }

    #[On('evtBorrarCategoria')]
    public function borrar(){
        $this->category->delete();
        $this->dispatch('mensaje', 'Categoria Eliminada');
    }

    /* METODOS EDITAR CATEGORIAS */
    public function editar(Category $category){
        $this->uform->setCategory($category);
        $this->openEditar=true;
    }

    public function update(){
        $this->uform->editarCategoriaForm();
        $this->dispatch('mensaje', 'Categoria Editada');
        $this->cancelarCategoria();
    }
    public function cancelarCategoria(){
        $this->uform->cancelarCategoriaForm();
        $this->openEditar=false;
    }
}
