<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ricardo',
            'email' => 'ricardollanos1@gmail.com',
            'password' => bcript('rick2111'),
        ]);
 
    }
}
