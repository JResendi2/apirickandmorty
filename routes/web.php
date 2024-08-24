<?php

use App\Http\Controllers\ApiTrivia;
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

/* App de Rick And Morty*/
Route::get('/rickandmorty', RickandmortyController::class)->name("rickandmorty");

/* App de fusion de PDFs */
Route::get('/mergepdf', [PdfController::class, "index"])->name("pdf.index");
Route::post('/mergepdf/merge', [PdfController::class, "merge"])->name("merge");
Route::get('/mergepdf/get-pdf/{filemane}', [PdfController::class, "getPDF"])->name("get-pdf");
Route::get('/mergepdf/download-pdf/{filemane}', [PdfController::class, "downloadPdf"])->name("download-pdf");

/* App de trivia */
Route::get('/temas', [ApiTrivia::class, 'getTemas'])->name('temas');
Route::get('/preguntas/{tema}', [ApiTrivia::class, 'getPreguntas'])->name('preguntas');
Route::get('/jugar', [ApiTrivia::class, 'jugar'])->name('jugar');