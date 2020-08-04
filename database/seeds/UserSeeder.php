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
        //
        DB::table('users')->insert(array (
            0 => 
            array (
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => '12345678',
            ),
        ));
    }
}
