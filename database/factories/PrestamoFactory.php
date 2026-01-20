<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $libros = Book::all();
        $usuarios = User::all();
        return [
            'fecha_prestamo'=>fake()->date(),
            'fecha_devolucion'=>fake()->date(),
            'estado'=>fake()->randomElement(['activo', 'devuelto']),
            'book_id'=>$libros->random()->id,
            'user_id'=>$usuarios->random()->id
        ];
    }
}
