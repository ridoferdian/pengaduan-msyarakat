<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['category_name' => 'Agama'],
            ['category_name' => 'Corona'],
            ['category_name' => 'Kesehatan'],
            ['category_name' => 'Masyarakat'],
            ['category_name' => 'Sekolah'],

        ]);

   }
}