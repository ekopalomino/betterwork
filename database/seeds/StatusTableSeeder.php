<?php

use Illuminate\Database\Seeder;
use iteos\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Integrity and Transparancy',
            'Orientation to learning and sharing knowledge',
            'Client Orientation',
            'Takes responsibility for performance',
            'Collaboration'
        ];

        foreach($statuses as $status) {
            Status::create(['name' => $status]);
        }
    }
}
