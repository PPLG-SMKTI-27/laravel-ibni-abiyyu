<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    public function run()
    {
        DB::table('skills')->insert([
            'name' => 'Laravel',
            'level' => 30,
        ]);
    }
}
