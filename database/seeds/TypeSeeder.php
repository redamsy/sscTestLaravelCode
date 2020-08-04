<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert(array (
            0 => 
            array (
                'name' => 'Premium',
            ),
            1 => 
            array (
                'name' => 'Middle',
            ),
            2 => 
            array (
                'name' => 'Compact',
            ),
        ));
    }
}
