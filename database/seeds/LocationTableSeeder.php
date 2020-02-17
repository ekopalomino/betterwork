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
            'Semarang',
            'Surabaya',
            'Aceh',
            'Medan',
            'Pekanbaru',
            'Bengkulu',
            'Padang',
            'Jambi',
            'Palembang',
            'Bandar Lampung',
            'Serang',
            'Cilegon',
            'Tangerang',
            'Karawaci',
            'Ciputat',
            'Ciledug',
            'Jakarta Barat',
            'Jakarta Timur',
            'Jakarta Selatan',
            'Bekasi',
            'Depok',
            'Serpong',
            'Bogor',
            'Cikarang',
            'Karawang',
            'Cikampek',
            'Purwakarta',
            'Cimahi',
            'Yogyakarta',
        ];

        foreach($locations as $location) {
            Location::create(['city' => $location]);
        }
    }
}
