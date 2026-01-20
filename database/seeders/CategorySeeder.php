<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias_biblioteca = [
            "Narrativa y Literatura" => "Colección de novelas, cuentos, poesía y obras de teatro, tanto clásicas como contemporáneas.",
            "Ciencias y Naturaleza"  => "Obras dedicadas al estudio de la biología, física, astronomía, matemáticas y el medio ambiente.",
            "Historia y Biografías"  => "Documentación de eventos pasados, civilizaciones antiguas y relatos de vida de figuras históricas.",
            "Tecnología e Informática" => "Recursos sobre programación, desarrollo de software, inteligencia artificial y novedades digitales.",
            "Arte y Diseño"          => "Libros sobre pintura, escultura, fotografía, música, arquitectura y teoría del color."
        ];

        foreach($categorias_biblioteca as $nombre=>$descripcion){
            Category::create(compact('nombre', 'descripcion'));
        }
    }
}
