<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->insert(array (
            0 => 
            array (
                'name' => 'canceled',
            ),
            1 => 
            array (
                'name' => 'completed',
            ),
            2 => 
            array (
                'name' => 'delivered',
            ),
        ));
    }
}
