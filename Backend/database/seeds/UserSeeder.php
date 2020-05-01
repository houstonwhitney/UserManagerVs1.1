<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'djouka',
            'last_name' => 'whitney',
            'email' => 'houstonwhitney@gmail.com',
            'password' => bcrypt('houston')
        ]); 
    }
}
