<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\trabajador;
use App\Models\User;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View
    {
        // Obtener todos los beneficiarios
        $trabajadores = trabajador::paginate(5);

        // Pasar los beneficiarios a la vista para mostrarlos
        return view('liconsa.listUsers', compact('trabajadores'));
    }
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $fields = [
            'nombre' => 'required|string|max:50',
            'apellido_p' => 'required|string|max:50',
            'apellido_m' => 'required|string|max:50',
            'curp' => 'required|string|max:18', // Asegúrate de que el CURP sea único en la tabla
            'rfc' => 'required|string|max:13|unique:trabajadores,rfc,', // Excluir al trabajador actual de la validación
            'rol' => 'required|string|in:vendedor,atencion_clientes,supervisor', // Asegúrate de que el rol sea uno de los valores permitidos
        ];
        $mensaje = [
            //'required' => 'El campo :attribute es obligatorio.',
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'apellido_p.required' => 'El campo Apellido Paterno es obligatorio.',
            'apellido_m.required' => 'El campo Apellido Materno es obligatorio.',
            'curp.required' => 'El campo CURP es obligatorio.',
            'rfc.required' => 'El campo RFC es obligatorio.',
            'rol.required' => 'El campo Rol es obligatorio.',
            'nombre.max' => 'El campo Nombre no debe exceder los 50 caracteres.',
            'apellido_p.max' => 'El campo Apellido Paterno no debe exceder los 50 caracteres.',
            'apellido_m.max' => 'El campo Apellido Materno no debe exceder los 50 caracteres.',
            'curp.max' => 'El campo CURP no debe exceder los 18 caracteres.',
            'rfc.max' => 'El campo RFC no debe exceder los 13 caracteres.',
            'rol.max' => 'El campo Rol debe ser uno de los disponibles.',
        ];
        $this->validate($request, $fields, $mensaje);

        // Crear y guardar el beneficiario usando asignación masiva
        trabajador::create($request->all());

        // Redireccionar a una ruta deseada con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Trabajador creado con éxito.');
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        // Validar los datos del formulario
        $fields = [
            'nombre' => 'required|string|max:50',
            'apellido_p' => 'required|string|max:50',
            'apellido_m' => 'required|string|max:50',
            'curp' => 'required|string|max:18', // Asegúrate de que el CURP sea único en la tabla
            'rfc' => 'required|string|max:13|unique:trabajadores,rfc,' . $id, // Excluir al trabajador actual de la validación
            'rol' => 'required|string|in:vendedor,atencion_clientes,supervisor', // Asegúrate de que el rol sea uno de los valores permitidos
        ];
        $mensaje = [
            //'required' => 'El campo :attribute es obligatorio.',
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'apellido_p.required' => 'El campo Apellido Paterno es obligatorio.',
            'apellido_m.required' => 'El campo Apellido Materno es obligatorio.',
            'curp.required' => 'El campo CURP es obligatorio.',
            'rfc.required' => 'El campo RFC es obligatorio.',
            'rol.required' => 'El campo Rol es obligatorio.',
            'nombre.max' => 'El campo Nombre no debe exceder los 50 caracteres.',
            'apellido_p.max' => 'El campo Apellido Paterno no debe exceder los 50 caracteres.',
            'apellido_m.max' => 'El campo Apellido Materno no debe exceder los 50 caracteres.',
            'curp.max' => 'El campo CURP no debe exceder los 18 caracteres.',
            'rfc.max' => 'El campo RFC no debe exceder los 13 caracteres.',
            'rol.max' => 'El campo Rol debe ser uno de los disponibles.',
        ];
        $this->validate($request, $fields, $mensaje);

        // Buscar el trabajador por su ID
        $trabajador = Trabajador::findOrFail($id);

        // Actualizar los datos del trabajador
        $trabajador->update($request->all());

        // Redireccionar a una ruta deseada con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Trabajador actualizado con éxito.');
    }

    public function edit($id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $trabajadores = trabajador::findOrFail($id);
        return view('liconsa.editUser', compact('trabajadores'));
    }
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        try {
            $trabajador = Trabajador::findOrFail($id);

            // Eliminar el trabajador
            $trabajador->delete();

            // Redireccionar con mensaje de éxito
            return redirect()->route('trabajadores.list')->with('success', 'Usuario eliminado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('trabajadores.list')->withErrors(['Error al eliminar el usuario: ' . $e->getMessage()]);
        }
    }
}
