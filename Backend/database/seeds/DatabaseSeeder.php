<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        /*DB::table('users')->insert([
            'name' => 'djouka',
            'email' => 'houstonwhitney@gmail.com',
            'password' => bcrypt('houston')
        ]); */
        DB::table('users')->insert([
            'first_name' => 'djouka',
            'last_name' => 'whitney',
            'email' => 'houstonwhitney@gmail.com',
            'password' => bcrypt('houston')
        ]); 


    }
}
