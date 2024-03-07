<?php

use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
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

require __DIR__.'/auth.php';

Route::get('/p1', function () {
    return view('pruebas.prueba1');
});
Route::get('/p2', function () {
    return view('pruebas.prueba2');
});
Route::get('/p3', function () {
    return view('pruebas.prueba3');
});
Route::get('/p4', function () {
    return view('pruebas.prueba4');
});
Route::get('/index', function () {
    return view('liconsa.index');
});
Route::get('/add', function () {
    return view('liconsa.agrBeneficiario');
})->name('add');
Route::get('/see', function () {
    return view('liconsa.seeBeneficiario');
});
Route::get('/list', function () {
    return view('liconsa.listBene');
});
Route::get('/addU', function () {
    return view('liconsa.addUser');
});
Route::get('/addS', function () {
    return view('liconsa.addSell');
});

Route::get('/card-pdf', [PdfController::class,'generatePDF'])->name('pdf.generate');




Route::post('/beneficiarios/store', [BeneficiarioController::class, 'store'])->name('beneficiarios.store');



