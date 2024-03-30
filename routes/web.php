<?php

use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Models\Beneficiario;
use App\Models\Trabajador;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\VentaController;
use App\Mail\NuevoBeneficiarioMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/1', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/index', function () {
    return view('liconsa.index');
})->name('index');

Route::get('/add', function () {
    return view('liconsa.agrBeneficiario');
})->name('beneficiarios.nuevo');

Route::get('/see/{id}', function () {
    return view('liconsa.seeBeneficiario');
})->name('details.ben');

Route::get('/edit/{id}', function () {
    return view('liconsa.editBeneficiario');
})->name('edit.ben');

Route::get('/edit/{id}', function () {
    return view('liconsa.editUser');
})->name('edit.user');

Route::get('/list', function () {
    return view('liconsa.listBene');
})->name('list.ben');

Route::get('/addU', function () {
    return view('liconsa.addUser');
})->name('user.nuevo');

Route::get('/addS', function () {
    return view('liconsa.addSell');
})->name('add.sell');

Route::get('/card-pdf/{id}', [PdfController::class, 'generatePDF'])->name('pdf.generate');

Route::post('/beneficiarios/store', [BeneficiarioController::class, 'store'])->name('beneficiarios.store');
Route::match(['get', 'post'], '/beneficiarios/update/{id}', [BeneficiarioController::class, 'update'])->name('beneficiarios.update');
Route::match(['get', 'post'], '/beneficiarios/editar/{id}', [BeneficiarioController::class, 'edit'])->name('beneficiarios.edit');
Route::match(['get', 'post'], '/beneficiarios/detalles/{id}', [BeneficiarioController::class, 'show'])->name('beneficiarios.show');
Route::match(['get', 'post'], '/beneficiarios/eliminar/{id}', [BeneficiarioController::class, 'destroy'])->name('beneficiarios.destroy');
Route::match(['get', 'post'], '/beneficiarios/imagen', [BeneficiarioController::class, 'savePhoto'])->name('beneficiarios.imagen');
Route::match(['get', 'post', 'delete'], '/beneficiarios/lista', [BeneficiarioController::class, 'index'])->name('beneficiarios.list');
Route::match(['get', 'post'], '/beneficiarios/buscar/', [BeneficiarioController::class, 'buscar'])->name('beneficiarios.buscar');

//Route::get('/beneficiarios/buscar', BeneficiarioController::class, 'buscar')->name('beneficiarios.buscar');


Route::post('/trabajadores/store', [TrabajadorController::class, 'store'])->name('trabajadores.store');
Route::match(['get', 'post'], '/trabajadores/update/{id}', [TrabajadorController::class, 'update'])->name('trabajadores.update');
Route::match(['get', 'post'], '/trabajadores/editar/{id}', [TrabajadorController::class, 'edit'])->name('trabajadores.edit');
Route::match(['get', 'post'], '/trabajadores/detalles/{id}', [TrabajadorController::class, 'show'])->name('trabajadores.show');
Route::match(['get', 'post'], '/trabajadores/eliminar/{id}', [TrabajadorController::class, 'destroy'])->name('trabajadores.destroy');

Route::post('/ventas/store', [VentaController::class, 'store'])->name('ventas.store');
Route::match(['get', 'post'], '/ventas/update/{id}', [VentaController::class, 'update'])->name('ventas.update');
Route::match(['get', 'post'], '/ventas/editar/{id}', [VentaController::class, 'edit'])->name('ventas.edit');
Route::match(['get', 'post'], '/ventas/detalles/{id}', [VentaController::class, 'show'])->name('ventas.show');
Route::match(['get', 'post'], '/ventas/eliminar/{id}', [VentaController::class, 'destroy'])->name('ventas.destroy');








