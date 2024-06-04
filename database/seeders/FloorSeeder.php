<?php

namespace Database\Seeders;

use App\Models\Floor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Floor::create([
            "floor" => 1,
        ]);
        Floor::create([
            "floor" => 2,
        ]);
        Floor::create([
            "floor" => 3,
        ]);
        Floor::create([
            "floor" => 4,
        ]);
        Floor::create([
            "floor" => 5,
        ]);
    }
}
