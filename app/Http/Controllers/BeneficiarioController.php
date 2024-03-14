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
    public function edit($id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $beneficiario = Beneficiario::findOrFail($id);
        return view('liconsa.editBeneficiario', compact('beneficiario'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $beneficiario = Beneficiario::findOrFail($id);

            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:50',
                'apellido_p' => 'required|string|max:50',
                'apellido_m' => 'required|string|max:50',
                'curp' => 'required|string|max:18|unique:beneficiarios,curp,'.$beneficiario->id, // Excluir el beneficiario actual de la validación
                'fecha_nac' => 'required|date',
                'n_dependientes' => 'required|integer',
                'direccion' => 'required|string|max:150',
                'num_lecheria' => 'required|string|max:10',
                'd_recoleccion' => 'nullable|string|max:50',
            ]);

            // Actualizar el beneficiario
            $beneficiario->update($request->all());

            // Redireccionar con mensaje de éxito
            return redirect()->route('edit.ben')->with('success', 'Beneficiario actualizado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('index')->withErrors(['Error al actualizar el beneficiario: ' . $e->getMessage()]);
        }
    }

    public function show($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            // Buscar el beneficiario por su ID
            $beneficiario = Beneficiario::findOrFail($id);

            // Pasar el beneficiario a la vista para mostrar sus detalles
            return view('liconsa.seeBeneficiario', compact('beneficiario'));
        } catch (\Exception $e) {
            // En caso de error, redireccionar a una ruta deseada con un mensaje de error
            return redirect()->route('index')->withErrors(['Error al buscar el beneficiario: ' . $e->getMessage()]);
        }
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        try {
            $beneficiario = Beneficiario::findOrFail($id);

            // Eliminar el beneficiario
            $beneficiario->delete();

            // Redireccionar con mensaje de éxito
            return redirect()->route('nombreDeTuRuta')->with('success', 'Beneficiario eliminado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('nombreDeTuRuta')->withErrors(['Error al eliminar el beneficiario: ' . $e->getMessage()]);
        }
    }


}
