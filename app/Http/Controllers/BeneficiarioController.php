<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeneficiarioController extends Controller
{
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:50',
                'apellido_p' => 'required|string|max:50',
                'apellido_m' => 'required|string|max:50',
                'curp' => 'required|string|max:18|unique:beneficiarios', // Asegúrate de que el CURP sea único en la tabla
                'fecha_nac' => 'required|date',
                'n_dependientes' => 'required|integer',
                'direccion' => 'required|string|max:150',
                'num_lecheria' => 'required|string|max:10',
                'd_recoleccion' => 'nullable|string|max:50',
            ]);
            $valorCalculado = Str::random(10); // Generas el valor de la manera que necesites
            $request->request->add(['folio_cb' => $valorCalculado]);
            $request->request->add(['Sancionado' => false]);

            // Crear y guardar el beneficiario usando asignación masiva
            Beneficiario::create($request->all());

            // Redireccionar a una ruta deseada con un mensaje de éxito
            return redirect()->route('add')->with('success', 'Beneficiario creado con éxito.');

        } catch (\Exception $e) {
            dd($e->getMessage());
            //return redirect()->route('add')->withErrors(['Error al crear el beneficiario']);
        }
    }
}
