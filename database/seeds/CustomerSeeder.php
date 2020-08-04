<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert(array (
            0 => 
            array (
                'name' => 'john',
                'contact' => 'johndoe@gmail.com',
                'address' => 'ghfjh',
                'credentials' => 'kkk',
            ),
            1 => 
            array (
                'name' => 'someone',
                'contact' => '+961435765',
                'address' => 'oooo',
                'credentials' => 'ghfh',
            )
        ));
    }
}
