<?php

namespace Database\Seeders;

use App\Models\Mediabook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            $mediabook->apartment_id = $faker->numberBetween(1, 21);
            $mediabook->slug = Str::slug($mediabook->title, '-'); //creazione slug
            $mediabook->img = 'https://via.placeholder.com/150';
            $mediabook->save();
        }
    }
    public static function storeimage($img)
    {
        $url = 'https:' . $img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = $temp_name . '.jpg';
        $path = 'images/' . $name;
        Storage::put('/public/images/' . $name, $contents);
        return $path;
    }
}