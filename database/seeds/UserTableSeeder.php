<?php

use Illuminate\Database\Seeder;
use iteos\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Eko Heru Wibowo',
        	'email' => 'heru.palomino@gmail.com',
        	'password' => bcrypt('P4l0m1n0@99'),
        ]);
    }
}
