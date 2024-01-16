<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = ['Front-end', 'Back-end', 'FullStack'];
        foreach ($categories as $value) {
            $newCategory = new Category();
            $newCategory->name = $value;
            $newCategory->slug = Str::slug($value, '-');
            $newCategory->save();
        }
    }
}
