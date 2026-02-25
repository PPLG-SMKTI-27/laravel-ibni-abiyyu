<?php
// database/seeders/SkillSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\Portfolio;

class SkillSeeder extends Seeder
{
    public function run()
    {
        $portfolio = Portfolio::first();
        
        if ($portfolio) {
            $skills = [
                [
                    'name' => 'Frontend Development',
                    'icon' => 'fas fa-code',
                    'percentage' => 30,
                    'delay' => 0.1
                ],
                [
                    'name' => 'Backend Development',
                    'icon' => 'fas fa-server',
                    'percentage' => 75,
                    'delay' => 0.2
                ],
                [
                    'name' => 'Mobile Development',
                    'icon' => 'fas fa-mobile-alt',
                    'percentage' => 40,
                    'delay' => 0.3
                ],
                [
                    'name' => 'Database Design',
                    'icon' => 'fas fa-database',
                    'percentage' => 70,
                    'delay' => 0.4
                ]
            ];

            foreach ($skills as $skillData) {
                Skill::create(array_merge($skillData, ['portfolio_id' => $portfolio->id]));
            }
        }
    }
}