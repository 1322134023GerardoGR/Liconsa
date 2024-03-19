<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\trabajador;
use App\Models\User;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:50',
                'apellido_p' => 'required|string|max:50',
                'apellido_m' => 'required|string|max:50',
                'curp' => 'required|string|max:18|unique:trabajadores', // Asegúrate de que el CURP sea único en la tabla
                'rfc' => 'required|string|max:13|unique:trabajadores', // Asegúrate de que el RFC sea único en la tabla
                'rol' => 'required|string|in:vendedor,atencion_clientes,supervisor', // Asegúrate de que el rol sea uno de los valores permitidos
            ], [
                'nombre.required' => 'El campo Nombre es obligatorio.',
                'apellido_paterno.required' => 'El campo Apellido Paterno es obligatorio.',
                'apellido_materno.required' => 'El campo Apellido Materno es obligatorio.',
                'curp.required' => 'El campo CURP es obligatorio.',
                'rfc.required' => 'El campo RFC es obligatorio.',
                'rol.required' => 'El campo Rol es obligatorio.',
            ]);

            // Crear y guardar el beneficiario usando asignación masiva
            trabajador::create($request->all());

            // Redireccionar a una ruta deseada con un mensaje de éxito
            return redirect()->route('index')->with('success', 'Trabajador creado con éxito.');

        } catch (\Exception $e) {
            return redirect()->route('index')->withErrors(['Error al crear el trabajador']);
        }
    }
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:50',
                'apellido_p' => 'required|string|max:50',
                'apellido_m' => 'required|string|max:50',
                'curp' => 'required|string|max:18|unique:trabajadores,curp,' . $id, // Excluir al trabajador actual de la validación
                'rfc' => 'required|string|max:13|unique:trabajadores,rfc,' . $id, // Excluir al trabajador actual de la validación
                'rol' => 'required|string|in:vendedor,atencion_clientes,supervisor', // Asegúrate de que el rol sea uno de los valores permitidos
            ], [
                'nombre.required' => 'El campo Nombre es obligatorio.',
                'apellido_p.required' => 'El campo Apellido Paterno es obligatorio.',
                'apellido_m.required' => 'El campo Apellido Materno es obligatorio.',
                'curp.required' => 'El campo CURP es obligatorio.',
                'rfc.required' => 'El campo RFC es obligatorio.',
                'rol.required' => 'El campo Rol es obligatorio.',
            ]);

            // Buscar el trabajador por su ID
            $trabajador = Trabajador::findOrFail($id);

            // Actualizar los datos del trabajador
            $trabajador->update($request->all());

            // Redireccionar a una ruta deseada con un mensaje de éxito
            return redirect()->route('index')->with('success', 'Trabajador actualizado con éxito.');

        } catch (\Exception $e) {
            return redirect()->route('index')->withErrors(['Error al actualizar el trabajador']);
        }
    }
    public function edit($id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $trabajadores = trabajador::findOrFail($id);
        return view('liconsa.editUser', compact('trabajadores'));
    }
}
