<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('arrayCategories');
        // dd($categorys);
        foreach ($categories as $category) {
            $newcategory = new Category();
            $newcategory->name = $category['name'];
            $newcategory->slug = Str::slug($newcategory->name, '-');
            $newcategory->img = $category['img'];
            $newcategory->save();
        }
    }
}