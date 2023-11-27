<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        $places = ["Mercado", "Escuela", "Casa", "Tienda"];
        foreach ($places as $key => $place) {
            Place::create([
                "name" => $place,
            ]);
        }

    }
}
