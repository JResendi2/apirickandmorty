<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apiRickAndMortyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        try {
            $page1 = Http::get("https://rickandmortyapi.com/api/character/?page=1"); // devuelve un objeto response
            $page3 = Http::get("https://rickandmortyapi.com/api/character/?page=2"); // devuelve un objeto response
            $page2 = Http::get("https://rickandmortyapi.com/api/character/?page=3"); // devuelve un objeto response
            $arryInfo = array_merge($page1["results"], $page2["results"], $page3["results"]); // $page1["results"] -> es un array

        } catch (\Throwable $th) {
            $arryInfo = [];
        }
        


        return $arryInfo;  //devolver un json
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $character = Http::get("https://rickandmortyapi.com/api/character/" . $id); // devuelve un objeto response
        } catch (\Throwable $th) {
            $character = json_encode([]);
        }
        return $character;  //devolver un json
    }


    public function showMultiple($arrayFilter)
    {
        $filters = "";
        foreach ($arrayFilter as $key => $value) {
            if ($value === "") {
                continue;
            }
            $filters = $filters .  $key . "=" . $value . "&";
        }
        if ($filters != "") {
            $filters = substr($filters, 0, strlen($filters) - 1);
            $filters = "?" . $filters;
        }
        try {
            $character = Http::get("https://rickandmortyapi.com/api/character/" . $filters); // devuelve un objeto response
        } catch (\Throwable $th) {
            $character = [];
        }
        
        if (isset($character["results"])) {
            return [
                "total" => count($character["results"]),
                "caracters" => $character["results"]
            ];
        } else {
            return [
                "total" => 0,
                "caracters" => []
            ];
        }
    }
}
