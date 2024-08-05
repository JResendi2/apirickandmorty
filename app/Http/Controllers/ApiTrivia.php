<?php

namespace App\Http\Controllers;

use App\Models\Preguntas;
use App\Models\Temas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ApiTrivia extends Controller
{
    public function jugar()
    {
        return view("app-trivia.jugar");
    }

    public function getTemas()
    {
        $temas = Temas::get();
        return response()->json($temas);
    }

    public function getPreguntas(int $tema_id)
    {
        $preguntas = Preguntas::with('respuestas')->where('tema_id', "=", $tema_id)->get();

        return response()->json($preguntas);
    }

}