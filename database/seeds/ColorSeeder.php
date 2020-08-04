<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('colors')->insert(array (
            0 => 
            array (
                'name' => 'Phantom Black',
            ),
            1 => 
            array (
                'name' => 'Sepang Blue',
            ),
        ));
    }
}
