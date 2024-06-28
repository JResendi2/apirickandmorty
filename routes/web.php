<?php

use App\Http\Controllers\PdfController;
use App\Livewire\RickandmortyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view("welcome");
});

Route::get('/rickandmorty', RickandmortyController::class)->name("rickandmorty");

Route::get('/mergepdf', [PdfController::class, "index"])->name("pdf.index");
Route::post('/mergepdf/merge', [PdfController::class, "merge"])->name("merge");
Route::get('/mergepdf/get-pdf/{filemane}', [PdfController::class, "getPDF"])->name("get-pdf");
Route::get('/mergepdf/download-pdf/{filemane}', [PdfController::class, "downloadPdf"])->name("download-pdf");
