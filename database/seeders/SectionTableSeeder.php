<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
   
    public function run()
    {
        \App\Models\Section::factory()->count(6)->create();
    }
}
