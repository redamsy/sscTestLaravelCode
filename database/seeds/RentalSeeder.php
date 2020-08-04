<?php

use Illuminate\Database\Seeder;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rentals')->insert(array (
            0 => 
            array (
                'user_id' => 1,
                'car_id' => 1,
                'customer_id' => 1,
                'status_id' => Null,
                'pickupDate' => '2020-08-18 13:57:10',
                'returnDate' => '2020-08-19 15:00:00',
                'isPaid' => true,
                'price' => 1000,
                'addCharges' => NULL,
                'created_at' => '2020-07-16 12:56:57',
                'updated_at' => '2020-07-16 12:57:10',
            ),
            1 => 
            array (
                'user_id' => 1,
                'car_id' => 2,
                'customer_id' => 1,
                'status_id' => Null,
                'pickupDate' => '2020-08-19 14:00:00',
                'returnDate' => '2020-08-30 15:00:00',
                'isPaid' => false,
                'price' => 1000,
                'addCharges' => NULL,
                'created_at' => '2020-07-16 12:57:34',
                'updated_at' => '2020-07-16 12:57:34',
            ),
        ));
    }
}
