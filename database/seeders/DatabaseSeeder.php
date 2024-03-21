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

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) { // Genera 10 beneficiarios, puedes ajustar este número según tus necesidades
            Beneficiario::create([
                'nombre' => $faker->firstName,
                'apellido_p' => $faker->lastName,
                'apellido_m' => $faker->lastName,
                'curp' => $faker->unique()->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
                'fecha_nac' => $faker->date,
                'n_dependientes' => $faker->numberBetween(1, 10),
                'direccion' => $faker->address,
                'num_lecheria' => $faker->numerify('####-####'),
                'folio_cb' => $faker->numberBetween(0, 999999999),
                'Sancionado' => $faker->boolean(10) // 10% de los beneficiarios son sancionados
            ]);
        }

        $faker = Faker::create();

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

        $faker = Faker::create();

        // Obtener todos los beneficiarios
        $beneficiarios = Beneficiario::all();

        foreach ($beneficiarios as $beneficiario) {
            // Generar ventas para cada beneficiario
            for ($i = 0; $i < 2; $i++) { // Genera 5 ventas por beneficiario, ajusta según tus necesidades
                $litrosVendidos = $faker->numberBetween(1, 100);
                $numLecheria = $faker->numberBetween(1, 10);
                $fecha = $faker->dateTimeThisYear();
                $total = $litrosVendidos * 6.50;

                // Crear la venta
                $venta = new Venta();
                $venta->beneficiario_id = $beneficiario->id;
                $venta->litros_v = $litrosVendidos;
                $venta->num_lecheria = $numLecheria;
                $venta->folio = $faker->unique()->randomNumber(9);
                $venta->fecha = $fecha->format('Y-m-d');
                $venta->hora = $fecha->format('H:i:s');
                $venta->total = $total;
                $venta->save();
            }
        }


    }
}
