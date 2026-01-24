<?php

namespace App\Livewire\Forms\Autores;

use App\Models\Author;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CrearAutoresForm extends Form
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

    public function crearAutorForm(){
        $this->validate();
        Author::create($this->all());
    }

    public function cancelarAutorForm(){
        $this->resetValidation();
        $this->reset();
    }
}
