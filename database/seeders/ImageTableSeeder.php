<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{

    public function run()
    {
        \App\Models\Image::factory()->count(30)->create();
    }
}
