<?php

use Illuminate\Database\Seeder;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('makes')->insert(array (
            0 => 
            array (
                'name' => 'Audi',
            ),
            1 => 
            array (
                'name' => 'VW',
            ),
            2 => 
            array (
                'name' => 'BMW',
            ),
            3 => 
            array (
                'name' => 'Volvo',
            ),
            4 => 
            array (
                'name' => 'Toyota',
            ),
        ));
    }
}
