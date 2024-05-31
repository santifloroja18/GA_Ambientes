<?php

namespace Database\Seeders;

use App\Models\Element;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Element::create([
            "element_name" => "sillas",
        ]);
        Element::create([
            "element_name" => "mesas",
        ]);
        Element::create([
            "element_name" => "computadores torre",
        ]);
        Element::create([
            "element_name" => "computadores onlyOne",
        ]);
        Element::create([
            "element_name" => "portatiles",
        ]);
        Element::create([
            "element_name" => "televisor",
        ]);
        Element::create([
            "element_name" => "casilleros",
        ]);
        Element::create([
            "element_name" => "aire acondicionado",
        ]);
        Element::create([
            "element_name" => "escritorios",
        ]);
    }
}
