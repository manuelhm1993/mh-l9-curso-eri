<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Datos de cada categoría
        $data = DataSeeders::getDataCategory();

        // Iterar data para crear tantas categorías como datos tenga
        foreach ($data as $item) {
            $category = new Category;

            $category->name        = $item['name'];
            $category->description = $item['description'];
            $category->active      = $item['active'];

            $category->save();
        }

    }
}
