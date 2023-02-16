<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = config('arrayAppartments');
        // dd($apartments);
        foreach ($apartments as $apartment) {
            $newapartment = new Apartment();
            $newapartment->title = $apartment['title'];
            // $newapartment->slug = Str::slug($newapartment->title, '-');
            $newapartment->slug = $apartment['slug'];
            $newapartment->room_number = $apartment['room_number'];
            $newapartment->cover_img = ApartmentSeeder::storeimage($apartment['cover_img']);
            $newapartment->bed_number = $apartment['bed_number'];
            $newapartment->bath_number = $apartment['bath_number'];
            $newapartment->mq_value = $apartment['mq_value'];
            $newapartment->address = $apartment['address'];
            $newapartment->lat = $apartment['lat'];
            $newapartment->category_id = $apartment['category_id'];
            $newapartment->long = $apartment['long'];
            $newapartment->price = $apartment['price'];
            $newapartment->visible = $apartment['visible'];
            $newapartment->save();
            $services = [1, 2, 3, 4, 5, 6, 7, 8, 9];
            $totRandServices = rand(1, 4);
            $apartRandServices = Arr::random($services, $totRandServices);
            $categories = [1, 2, 3, 4, 5, 6];
            $apartRandCat = Arr::random($categories, 1);
            $newapartment->services()->sync($apartRandServices);


        }
    }

    public static function storeimage($img)
    {
        $url = 'https:' . $img . '.jpg';
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = $temp_name . '.jpg';
        $path = 'images/' . $name;
        Storage::put('/public/images/' . $name, $contents);
        return $path;
    }
}