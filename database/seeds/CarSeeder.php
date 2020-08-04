<?php

use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cars')->insert(array (
            0 => 
            array (
                'model_id' => 1,
                'fuel_id' => 1,
                'registration' => 'ZG1211GH',
                'chassis' => 'jhkhk',
                'color_id' => 1,
                'year' => 0,
                'capacity' => 5,
                'isAutomatic' => 1,
                'equipment' => 'llll',
                'flaw' => 'nothing',
                'type_id' => 2,
                'mileage' => 22,
                'isAvailable' => 0,
            ),
            1 => 
            array (
                'model_id' => 3,
                'fuel_id' => 2,
                'registration' => 'ZG222BH',
                'chassis' => 'lll',
                'color_id' => 2,
                'year' => 0,
                'capacity' => 4,
                'isAutomatic' => 0,
                'equipment' => 'kkkk',
                'flaw' => 'nothing',
                'type_id' => 3,
                'mileage' => 18,
                'isAvailable' => 0,
            ),
            2 => 
            array (
                'model_id' => 5,
                'fuel' => 1,
                'registration' => 'ZG111kl',
                'chassis' => 'llipiop',
                'color' => 2,
                'year' => 0,
                'capacity' => 5,
                'isAutomatic' => 1,
                'equipment' => 'ggg',
                'flaw' => 'nothing',
                'type_id' => 2,
                'mileage' => 24,
                'isAvailable' => 1,
            ),
        ));
    }
}
