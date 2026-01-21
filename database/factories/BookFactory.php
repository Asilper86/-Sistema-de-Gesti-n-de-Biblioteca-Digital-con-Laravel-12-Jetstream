<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Bilions\FakerImages\FakerImageProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        fake()->addProvider(new FakerImageProvider(fake()));
        $image = fake()->image(sys_get_temp_dir(), 640, 480);
        $autores = Author::all();
        $categorias = Category::all();
        return [
            'titulo'=>fake()->unique()->realText('30'),
            'año_publicacion'=>fake()->year(),
            'editorial'=>substr(fake()->company(), 0, 10) ,
            'num_paginas'=>fake()->numberBetween(100, 1100),
            'author_id'=>$autores->random()->id,
            'category_id'=>$categorias->random()->id,
            'portada'=>Storage::disk('public')->putFileAs('images/books', new File($image), basename($image))
        ];
    }
}
