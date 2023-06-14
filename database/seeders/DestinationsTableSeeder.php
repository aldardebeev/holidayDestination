<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            ['name' => 'tomsk',
                'long' => 12.3,
                'lat' => 1.2,
            ],
            [
                'name' => 'omsk',
                'long' => 12.3,
                'lat' => 1.2,
            ],
            [
                'name' => 'moscow',
                'long' => 12.3,
                'lat' => 1.2,
            ],

        ];

        foreach ($destinations as $destinationData) {
            $existingDestination = Destination::where('lat', $destinationData['lat'])
                ->where('long', $destinationData['long'])->first();

            if (!$existingDestination) {
                Destination::create($destinationData);
            }
        }
    }
}
