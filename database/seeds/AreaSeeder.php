<?php

use App\Models\Area;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 5; $i++) {
            Area::create(
                [
                    'nombre_area' => $faker->country(),
                ]
            );
        }
    }
}
