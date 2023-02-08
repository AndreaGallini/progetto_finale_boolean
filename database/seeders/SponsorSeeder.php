<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = config('arraySponsor');
        foreach ($array as $sponsor) {
            $newsponsor = new Sponsor;
            $newsponsor->name = $sponsor['name'];
            $newsponsor->price = $sponsor['price'];
            $newsponsor->time = $sponsor['time'];
            $newsponsor->save();

        }
    }
}