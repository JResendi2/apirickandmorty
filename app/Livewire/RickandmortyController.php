<?php

namespace App\Livewire;

use App\Http\Controllers\apiRickAndMortyController;
use Livewire\Component;

class RickandmortyController extends Component
{

    public $characters;
    public $character;
    public $charactersFilters = [];
    public $allCharacters = [];
    public $arrayFilter = [];

    public $totalMain = 0;
    public $skip = 0;

    public $status = "";
    public $gender = "";
    public $specie = "";

    public $totalInfo = 10;

    public function mount(): void
    {
        $this->apiIndex();
        $this->apiShow(1);
        $this->apiShowMultiple();
    }

    public function render()
    {
        return view('livewire.rickandmorty-controller');
    }

    private function apiIndex(){
        $rickandmortyAPI = new apiRickAndMortyController();
        $this->characters = $rickandmortyAPI->index();
        $this->characters = array_slice($this->characters, 0, $this->totalInfo);
    }

    public function apiShow($id){
        $rickandmortyAPI = new apiRickAndMortyController();
        $this->character = json_decode($rickandmortyAPI->show($id));
    }

    private function apiShowMultiple(){
        $rickandmortyAPI = new apiRickAndMortyController();
        $restult = $rickandmortyAPI->showMultiple($this->arrayFilter);
        $this->totalMain = $restult["total"];
        $this->allCharacters = $restult["caracters"];
        $this->charactersFilters = array_slice($this->allCharacters, $this->skip, 4);

    }

    public function setFilters(){
        $this->arrayFilter = [
            "status" => $this->status,
            "gender" => $this->gender,
            "species" => $this->specie
        ];
        $this->skip = 0;
        $this->apiShowMultiple();
    }

    public function skipCaracters($cant){
        if (($cant < 0 && $this->skip + $cant >= 0) ||
            ($cant > 0 && $this->skip + $cant < $this->totalMain)
        ) {
            $this->skip += $cant;
            $this->charactersFilters = array_slice($this->allCharacters, $this->skip, 4);
        }
    }


    public function moreCharacters(): void
    {
        $this->totalInfo += 10;
        $this->apiIndex();
    }
}
