<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Venta;

// Asegúrate de importar el modelo Venta
use App\Models\Beneficiario;

// Asegúrate de importar el modelo Beneficiario
use Illuminate\Http\Request;
use Carbon\Carbon;

class VentaController extends Controller
{
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'litros_v' => 'required|int|max:3',
                'num_lecheria' => 'required|int',
            ], [
                'litros_v.required' => 'El campo Litros vendidos es obligatorio.',
                'num_lecheria.required' => 'El campo Número de lechería es obligatorio.',
            ]);

            // Obtener el ID del beneficiario a partir del código
            $code = $request->input('code');
            $beneficiario = Beneficiario::where('folio_cb', $code)->first();

            if (!$beneficiario) {
                return redirect()->route('index')->withErrors(['Código de beneficiario no encontrado']);
            }

            // Crear la venta
            $valorCalculado = random_int(0, 999999999);
            $folio = str_pad($valorCalculado, 9, "0", STR_PAD_LEFT);
            $date = Carbon::now('America/Mexico_City');
            $total = $request->input('litros_v') * 6.50;

            $venta = new Venta();
            $venta->beneficiario_id = $beneficiario->id;
            $venta->litros_v = $request->input('litros_v');
            $venta->num_lecheria = $request->input('num_lecheria');
            $venta->folio = $folio;
            $venta->fecha = $date->format('Y-m-d');
            $venta->hora = $date->format('H:i:s');
            $venta->total = $total;
            $venta->save();

            // Redireccionar a una ruta deseada con un mensaje de éxito
            return redirect()->route('index')->with('success', 'Venta agregada con éxito.');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
