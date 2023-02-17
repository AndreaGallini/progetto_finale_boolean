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
        $apartments = config('arrayAppartments');
        $mediabooks = config('mediabook');
        $totApartments = count($apartments);

        for ($i = 0; $i < $totApartments; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $mediabook = new Mediabook();
                $mediabook->title = $faker->sentence(1);
                $mediabook->apartment_id = $i + 1;
                $mediabook->slug = Str::slug($mediabook->title, '-'); //creazione slug
                $mediabook->img = MediabookSeeder::storeimage($mediabooks[$i][$j]);
                $mediabook->save();
            }
        }
    }
    public static function storeimage($img)
    {
        $url = $img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = $temp_name;
        $path = 'images/' . $name;
        Storage::put('/public/images/' . $name, $contents);
        return $path;
    }
}