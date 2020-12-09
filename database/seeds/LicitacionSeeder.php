<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Licitacion;

class LicitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creamos una instancia de Faker
        $faker = Faker::create();

        // Creamos un bucle para cubrir 5 Licitaciones:
        for ($i = 1; $i <= 5; $i++) {
            // Cuando llamamos al método create del Modelo Fabricante
            // se está creando una nueva fila en la tabla.
            Licitacion::create(
                [
                    'nombre' => $faker->name(),
                    'id_cliente' => $faker->numberBetween(1111, 9999),
                    'fecha_inicio' => $faker->date(),
                    'fecha_cierre' => $faker->date(),
                    'fecha_presentacion_documentos' => $faker->date(),
                ]
            );
        }
    }
}
