<?php

use Illuminate\Database\Seeder;
use iteos\Models\Location;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'Jakarta',
            'Bandung',
        ];

        foreach($locations as $location) {
            Location::create(['city' => $location]);
        }
    }
}
