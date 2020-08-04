<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MakeSeeder::class);
        $this->call(ModelSeeder::class);
        $this->call(FuelSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(RentalSeeder::class);
        $this->call(RentalTypeSeeder::class);
        $this->call(RentalRateSeeder::class);
    }
}
