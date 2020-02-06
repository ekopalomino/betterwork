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
            '3 Month Probation',
            '6 Month Probation',
            '1 Year Contract',
            'Permanent',
        ];

        foreach($statuses as $status) {
            Status::create(['name' => $status]);
        }
    }
}
