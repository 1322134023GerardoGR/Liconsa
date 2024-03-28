<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BeneficiarioController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View
    {
        // Obtener todos los beneficiarios
        $beneficiarios = Beneficiario::all();

        // Pasar los beneficiarios a la vista para mostrarlos
        return view('liconsa.listBene', compact('beneficiarios'));
    }

    public function store(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
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
            $valorCalculado = random_int(0,999999999); // Generas el valor de la manera que necesites
            $folio=''.str_pad($valorCalculado, 9, "0", STR_PAD_LEFT);
            $request->request->add(['folio_cb' => $folio]);
            $request->request->add(['Sancionado' => false]);

            // Crear y guardar el beneficiario usando asignación masiva
            Beneficiario::create($request->all());
            $id = Beneficiario::where('folio_cb', $folio)->first()->id;
            $beneficiario = Beneficiario::findOrFail($id);


            // Redireccionar a una ruta deseada con un mensaje de éxito
            //return redirect()->route('add')->with('success', 'Beneficiario creado con éxito.');
            return view('liconsa.seeBeneficiario', compact('beneficiario'));


        } catch (\Exception $e) {
            dd($e->getMessage());
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
            return redirect()->route('index')->with('success', 'Beneficiario actualizado con éxito.');
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
            return redirect()->route('beneficiarios.list')->with('success', 'Beneficiario eliminado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('beneficiarios.list')->withErrors(['Error al eliminar el beneficiario: ' . $e->getMessage()]);
        }
    }


    public function savePhoto(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            // Obtener la foto capturada y el nombre de archivo de la imagen existente
            $photo = $request->photo; // Foto capturada en formato base64
            $existingPhoto = $request->existing_photo; // Nombre de archivo de la imagen existente

            // Eliminar la imagen existente si hay una


            // Guardar la nueva foto con el mismo nombre de archivo
            $photoData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photo));
            file_put_contents($existingPhoto,$photoData);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($existingPhoto);

// crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel

            $image->cover(600, 360);

// crop the best fitting 1:1 ratio (200x200) and resize to 200x200 pixel
            $image->cover(200, 200);

// cover a size of 300x300 and position crop on the left
            $image->cover(300, 300, 'left'); // 300 x 300 px

            $image->save($existingPhoto);
            // Devolver una respuesta
               return response()->json(['success' => 'Foto guardada con éxito.']);
        }catch (\Exception $e) {
            return response()->json(['error' => 'Error al guardar la foto: ' . $e->getMessage()]);
        }

    }
}
