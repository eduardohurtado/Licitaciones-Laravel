<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Licitacion;
use App\Models\Area;
use App\Models\Documento;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $howManyLicitacion = Licitacion::all()->count();
        $howManyArea = Area::all()->count();

        for ($i = 1; $i <= 20; $i++) {
            Documento::create(
                [
                    'nombre_documentos' => $faker->word(),
                    'URL_documentos' => $faker->url(),
                    'fecha_entrega' => $faker->date(),
                    'usuario_entrega' => $faker->date(),
                    'id_licitacion' => $faker->numberBetween(1, $howManyLicitacion),
                    'id_area' => $faker->numberBetween(1, $howManyArea)
                ]
            );
        }
    }
}
