<?php

namespace App\Livewire\Forms\Autores;

use App\Models\Author;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditarAutoresForm extends Form
{
    
    #[Validate(['required', 'string', 'min:3', 'max:50'])]
    public string $nombre = "";
    #[Validate(['required', 'string', 'min:5', 'max:70'])]
    public string $apellidos = "";
    #[Validate(['required','string', 'min:3', 'max:50'])]
    public string $nacionalidad = "";

    #[Validate(['required', 'date'])]
    public string $fecha_nacimiento = "";
    #[Validate(['required', 'string', 'min:10', 'max:500'])]
    public string $biografia = "";

    public ?Author $autor = null;
    public function setAutores(Author $author){
        $this->autor=$author;
        $this->nombre=$author->nombre;
        $this->apellidos=$author->apellidos;
        $this->nacionalidad=$author->nacionalidad;
        $this->fecha_nacimiento=$author->fecha_nacimiento;
        $this->biografia=$author->biografia;
    }
    public function editarAutorForm(){
        $this->validate();
        $this->autor->update($this->all());
    }

    public function cancelarAutorForm(){
        $this->resetValidation();
        $this->reset();
    }
}
