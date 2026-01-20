<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Prestamo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        $this->call(CategorySeeder::class);
        Author::factory(50)->create();
        Book::factory(100)->create();
        Prestamo::factory(30)->create();
        
    }
}
