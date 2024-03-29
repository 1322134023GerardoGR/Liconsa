<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\beneficiario;
use App\Models\dependiente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use function PHPUnit\TestFixture\func;

class BeneficiarioController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View
    {
        // Obtener todos los beneficiarios
        $beneficiarios = Beneficiario::paginate(5);

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
                'curp_beneficiarios.*' => 'nullable|string|max:18', // Validación para los CURPs de dependientes


            ]);
            $valorCalculado = random_int(0, 999999999); // Generas el valor de la manera que necesites
            $folio = '' . str_pad($valorCalculado, 9, "0", STR_PAD_LEFT);

            $d_asist1 = $request->input('d_asist1');
            $d_asist2 = $request->input('d_asist2');
            $d_asist3 = $request->input('d_asist3');

            if ($d_asist1 == null || $d_asist1 == '' || $d_asist1 == 'NA' || $d_asist1 == 'N/A' || $d_asist1 == 'Na' || $d_asist1 == 'na') $d_asist1 = 0;
            else $d_asist1 = $this->daysWeek($d_asist1);
            if ($d_asist2 == null || $d_asist2 == '' || $d_asist2 == 'NA' || $d_asist2 == 'N/A' || $d_asist2 == 'Na' || $d_asist2 == 'na') $d_asist2 = 0;
            else $d_asist2 = $this->daysWeek($d_asist2);
            if ($d_asist3 == null || $d_asist3 == '' || $d_asist3 == 'NA' || $d_asist3 == 'N/A' || $d_asist3 == 'Na' || $d_asist3 == 'na') $d_asist3 = 0;
            else $d_asist3 = $this->daysWeek($d_asist3);

            $request->request->add(['d_asist1' => $d_asist1]);
            $request->request->add(['d_asist2' => $d_asist2]);
            $request->request->add(['d_asist3' => $d_asist3]);
            $request->request->add(['folio_cb' => $folio]);
            $request->request->add(['Sancionado' => false]);


            // Crear y guardar el beneficiario usando asignación masiva
            //Beneficiario::create($request->all());
            $beneficiario = Beneficiario::create($request->except('curp_beneficiarios'));
            foreach ($request->curp_beneficiarios as $curpDependiente) {
                if (!empty($curpDependiente)) {
                    $dependientes = new Dependiente();
                    $dependientes->curp = $curpDependiente;
                    $dependientes->code = $folio;
                    $dependientes->beneficiario_id = $beneficiario->id; // Asignar la foreign key
                    $dependientes->save();
                }
            }
            $id = Beneficiario::where('folio_cb', $folio)->first()->id;
            $beneficiario = Beneficiario::findOrFail($id);

            $beneficiario->d_asist1 = $this->weekDays($beneficiario->d_asist1);
            $beneficiario->d_asist2 = $this->weekDays($beneficiario->d_asist2);
            $beneficiario->d_asist3 = $this->weekDays($beneficiario->d_asist3);
            // Redireccionar a una ruta deseada con un mensaje de éxito
            //return redirect()->route('add')->with('success', 'Beneficiario creado con éxito.');
            $dependientes = Dependiente::where('beneficiario_id', $id)->get();
            return view('liconsa.seeBeneficiario', compact('beneficiario', 'dependientes'));


        } catch (\Exception $e) {
            $errors = ['Error al agregar el beneficiario, ya existe un beneficiario con ese CURP:',''];
            return view('liconsa.index', compact('errors'));
        }
    }

    private function daysWeek($dayName)
    {
        $days = [
            'Domingo' => 0,
            'domingo' => 0,
            'Lunes' => 1,
            'lunes' => 1,
            'Martes' => 2,
            'martes' => 2,
            'Miercoles' => 3,
            'miercoles' => 3,
            'Miércoles' => 3,
            'miércoles' => 3,
            'Jueves' => 4,
            'jueves' => 4,
            'Viernes' => 5,
            'viernes' => 5,
            'Sabado' => 6,
            'sabado' => 6,
            'Sábado' => 6,
            'sábado' => 6,
        ];
        return $days[$dayName];
    }

    private function weekDays($dayName)
    {
        $days = [
            0 => 'N/A',
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miércoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'Sábado',
            9 => 'N/A',
        ];
        return $days[$dayName];
    }

    public function buscar(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $code = $request->input('codigo');

        $beneficiario = beneficiario::where('folio_cb', $code)->first();
        $dependientes = Dependiente::where('code', $code)->get();
        $beneficiario->d_asist2 = $this->weekDays($beneficiario->d_asist2);
        $beneficiario->d_asist3 = $this->weekDays($beneficiario->d_asist3);

        return view('liconsa.seeBeneficiario', compact('beneficiario', 'dependientes'));        $beneficiario->d_asist1 = $this->weekDays($beneficiario->d_asist1);
    }

    public function edit($id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $beneficiario = Beneficiario::findOrFail($id);
        $dependientes = Dependiente::where('beneficiario_id', $id)->get();

        if ($beneficiario->d_asist1 === 0) {
            $beneficiario->d_asist1 = $this->weekDays(9);
        } else $beneficiario->d_asist1 = $this->weekDays($beneficiario->d_asist1);
        if ($beneficiario->d_asist2 === 0) {
            $beneficiario->d_asist2 = $this->weekDays(9);
        } else $beneficiario->d_asist2 = $this->weekDays($beneficiario->d_asist2);
        if ($beneficiario->d_asist3 === 0) {
            $beneficiario->d_asist3 = $this->weekDays(9);
        } else $beneficiario->d_asist3 = $this->weekDays($beneficiario->d_asist3);
        return view('liconsa.editBeneficiario', compact('beneficiario', 'dependientes'));
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
                'curp' => 'required|string|max:18|unique:beneficiarios,curp,' . $beneficiario->id,
                'fecha_nac' => 'required|date',
                'n_dependientes' => 'required|integer',
                'direccion' => 'required|string|max:150',
                'num_lecheria' => 'required|integer',
                'd_asist1' => 'nullable|string|max:50',
                'd_asist2' => 'nullable|string|max:50',
                'd_asist3' => 'nullable|string|max:50',
            ]);

            // Actualizar los campos del beneficiario
            $beneficiario->nombre = $request->input('nombre');
            $beneficiario->apellido_p = $request->input('apellido_p');
            $beneficiario->apellido_m = $request->input('apellido_m');
            $beneficiario->curp = $request->input('curp');
            $beneficiario->fecha_nac = $request->input('fecha_nac');
            $beneficiario->n_dependientes = $request->input('n_dependientes');
            $beneficiario->direccion = $request->input('direccion');
            $beneficiario->num_lecheria = $request->input('num_lecheria');

            $d_asist1 = $request->input('d_asist1');
            $d_asist2 = $request->input('d_asist2');
            $d_asist3 = $request->input('d_asist3');

            if ($d_asist1 == null || $d_asist1 == '' || $d_asist1 == 'NA' || $d_asist1 == 'N/A' || $d_asist1 == 'Na' || $d_asist1 == 'na') $d_asist1 = 0;
            else $d_asist1 = $this->daysWeek($d_asist1);
            if ($d_asist2 == null || $d_asist2 == '' || $d_asist2 == 'NA' || $d_asist2 == 'N/A' || $d_asist2 == 'Na' || $d_asist2 == 'na') $d_asist2 = 0;
            else $d_asist2 = $this->daysWeek($d_asist2);
            if ($d_asist3 == null || $d_asist3 == '' || $d_asist3 == 'NA' || $d_asist3 == 'N/A' || $d_asist3 == 'Na' || $d_asist3 == 'na') $d_asist3 = 0;
            else $d_asist3 = $this->daysWeek($d_asist3);

            $beneficiario->d_asist1 = $d_asist1;
            $beneficiario->d_asist2 = $d_asist2;
            $beneficiario->d_asist3 = $d_asist3;

            $dependientes = Dependiente::where('beneficiario_id', $id)->get();
            foreach ($dependientes as $dependiente) {
                $curpDependiente = $request->input('curp_dependiente_' . $dependiente->id);
                $dependiente->curp = $curpDependiente;
                $dependiente->save();
            }

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
            $dependientes = Dependiente::where('beneficiario_id', $id)->get();
            $beneficiario->d_asist1 = $this->weekDays($beneficiario->d_asist1);
            if ($beneficiario->d_asist2 === 0) $beneficiario->d_asist2 = ''; else $beneficiario->d_asist2 = $this->weekDays($beneficiario->d_asist2);
            if ($beneficiario->d_asist3 === 0) $beneficiario->d_asist3 = ''; else $beneficiario->d_asist3 = $this->weekDays($beneficiario->d_asist3);

            // Pasar el beneficiario a la vista para mostrar sus detalles
            return view('liconsa.seeBeneficiario', compact('beneficiario', 'dependientes'));
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
            file_put_contents($existingPhoto, $photoData);
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
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al guardar la foto: ' . $e->getMessage()]);
        }

    }
}
