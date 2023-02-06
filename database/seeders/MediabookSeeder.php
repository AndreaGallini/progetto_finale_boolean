<?php

namespace Database\Seeders;

use App\Models\Mediabook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class MediabookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            $mediabook = new Mediabook();
            $mediabook->title = $faker->sentence(1);
            $mediabook->slug = Str::slug($mediabook->title, '-'); //creazione slug
            $mediabook->img = 'https://via.placeholder.com/150';
            $mediabook->save();
        }
    }
}