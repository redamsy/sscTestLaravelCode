<?php

use Illuminate\Database\Seeder;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fuels')->insert(array (
            0 => 
            array (
                'name' => 'Diesel',
            ),
            1 => 
            array (
                'name' => 'Gasoline',
            ),
            2 => 
            array (
                'name' => 'Electric',
            ),
            3 => 
            array (
                'name' => 'Hybrid',
            ),
        ));
    }
}
