<?php

use Illuminate\Database\Seeder;

class RentalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rentaltypes')->insert(array (
            0 => 
            array (
                'name' => 'hourly',
            ),
            1 => 
            array (
                'name' => 'daily',
            ),
            2 => 
            array (
                'name' => 'monthly',
            ),
        ));
    }
}
