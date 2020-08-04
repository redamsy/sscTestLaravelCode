<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('images')->insert(array (
            0 => 
            array (
                'fileName' => '1.jpg',
                'car_id' => '1',
            ),
            1 => 
            array (
                'fileName' => '2.jpg',
                'car_id' => '1',
            ),
            2 => 
            array (
                'fileName' => '3.jpg',
                'car_id' => '2',
            ),
            3 => 
            array (
                'fileName' => '4.jpg',
                'car_id' => '3',
            ),
            4 => 
            array (
                'fileName' => '5.jpg',
                'car_id' => '3',
            ),
        ));
    }
}
