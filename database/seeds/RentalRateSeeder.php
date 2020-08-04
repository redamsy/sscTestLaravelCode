<?php

use Illuminate\Database\Seeder;

class RentalRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rentalrates')->insert(array (
            0 => 
            array (
                'rentaltype_id' => '1',
                'car_id' => '1',
                'rate' => '5',
            ),
            1 => 
            array (
                'rentaltype_id' => '2',
                'car_id' => '1',
                'rate' => '50',
            ),
            2 => 
            array (
                'rentaltype_id' => '3',
                'car_id' => '1',
                'rate' => '1000',
            ),
            3 => 
            array (
                'rentaltype_id' => '1',
                'car_id' => '2',
                'rate' => '5',
            ),
            4 => 
            array (
                'rentaltype_id' => '2',
                'car_id' => '2',
                'rate' => '50',
            ),
            5 => 
            array (
                'rentaltype_id' => '3',
                'car_id' => '2',
                'rate' => '1000',
            ),
            6 => 
            array (
                'rentaltype_id' => '1',
                'car_id' => '3',
                'rate' => '5',
            ),
            7 => 
            array (
                'rentaltype_id' => '2',
                'car_id' => '3',
                'rate' => '50',
            ),
            8 => 
            array (
                'rentaltype_id' => '3',
                'car_id' => '3',
                'rate' => '1000',
            ),
        ));
    }
}
