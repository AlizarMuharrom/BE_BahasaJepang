<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['level_name' => 'Pemula'],
            ['level_name' => 'N5'],
            ['level_name' => 'N4'],
        ];

        foreach ($levels as $level) {
            Level::create(
                $level
            );
        }
    }
}
