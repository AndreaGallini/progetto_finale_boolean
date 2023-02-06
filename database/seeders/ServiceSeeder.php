<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = config('arrayServices');
        // dd($services);
        foreach ($services as $service) {
            $newservice = new Service();
            $newservice->title = $service['title'];
            $newservice->slug = Str::slug($newservice->title, '-');
            $newservice->img = $service['img'];
            $newservice->save();
        }
    }
}