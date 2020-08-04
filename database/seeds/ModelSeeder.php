<?php

use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('models')->insert(array (
            0 => 
            array (
                'make_id' => 1,
                'name' => 'A4',
            ),
            1 => 
            array (
                'make_id' => 2,
                'name' => 'Polo',
            ),
            2 => 
            array (
                'make_id' => 2,
                'name' => 'Up!',
            ),
            3 => 
            array (
                'make_id' => 3,
                'name' => '118d',
            ),
            4 => 
            array (
                'make_id' => 4,
                'model' => 'S40',
            ),
            5 => 
            array (
                'make_id' => 4,
                'model' => 'S40',
            ),
            6 => 
            array (
                'make_id' => 5,
                'name' => 'Yaris',
            ),
        ));
    }
}
