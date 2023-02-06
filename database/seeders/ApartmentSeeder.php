<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            $newapartment->slug = Str::slug($newapartment->name, '-');
            $newapartment->room_number = $apartment['room_number'];
            $newapartment->cover_img = $apartment['cover_img'];
            $newapartment->bed_number = $apartment['bed_number'];
            $newapartment->bath_number = $apartment['bath_number'];
            $newapartment->mq_value = $apartment['mq_value'];
            $newapartment->address = $apartment['address'];
            $newapartment->lat = $apartment['lat'];
            $newapartment->long = $apartment['long'];
            $newapartment->price = $apartment['price'];
            $newapartment->visible = $apartment['visible'];
            $newapartment->save();
        }
    }
}
