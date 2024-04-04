<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\beneficiario;
use App\Models\trabajador;
use App\Models\venta;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(1)->create();

         \App\Models\User::factory()->create([
            'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => bcrypt('password'),
         ]);

        $faker = Faker::create('es_MX');

        for ($i = 0; $i < 50; $i++) { // Genera 10 beneficiarios, puedes ajustar este número según tus necesidades
            $numerosUnicos = $this->generarNumerosUnicos();
            Beneficiario::create([
                'nombre' => $faker->firstName,
                'apellido_p' => $faker->lastName,
                'apellido_m' => $faker->lastName,
                'curp' => $faker->unique()->regexify('[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9]{2}'),
                'fecha_nac' => $faker->date,
                'n_dependientes' => $faker->numberBetween(1, 2),
                'direccion' => $faker->address,
                'num_lecheria' => $faker->numberBetween(1, 100000),
                'd_asist1' => $numerosUnicos[0],
                'd_asist2' => $numerosUnicos[1],
                'd_asist3' => $numerosUnicos[2],
                'folio_cb' => $faker->numberBetween(0, 999999999),
                'Sancionado' => $faker->boolean(10) // 10% de los beneficiarios son sancionados
            ]);
        }

        $faker = Faker::create('es_MX');

        $roles = ['vendedor', 'atencion_clientes', 'supervisor'];

        for ($i = 0; $i < 10; $i++) { // Genera 10 trabajadores, puedes ajustar este número según tus necesidades
            Trabajador::create([
                'nombre' => $faker->firstName,
                'apellido_p' => $faker->lastName,
                'apellido_m' => $faker->lastName,
                'curp' => $faker->unique()->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
                'rfc' => $faker->unique()->regexify('[A-Z]{4}[0-9]{6}[A-Z0-9]{3}'),
                'rol' => $faker->randomElement($roles),
            ]);
        }


    }
    protected function generarNumerosUnicos(): array
    {
        $numeros = [];

        while (count($numeros) < 3) {
            $numero = random_int(0, 6); // Ajustamos los límites a 0 y 6
            if (!in_array($numero, $numeros)) {
                $numeros[] = $numero;
            }
        }

        return $numeros;
    }
}
