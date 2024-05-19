<div>

    <div class="row">

    <div class="col bg-primary row p-5 rounded">
        <p class="text-end text-white">{{$skip}} - {{$skip+4}} de {{$totalMain}}</p>

        <div class="main-body mb-5 position-relative gap-2 d-flex justify-content-between py-5 bg-secondary rounded">
            
            @forelse ($charactersFilters as $c)
                <div class="main-imgs rounded overflow-hidden">
                    <img class="img-fluid main-img" src="{{$c["image"]}}" alt="img">
                </div>
            @empty
                fsdf
            @endforelse

            <div class="btn-prev" wire:loading.class="disable" wire:click="skipCaracters(-4)">
                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#F3F3F3"><path d="M400-80 0-480l400-400 61 61.67L122.67-480 461-141.67 400-80Z"/></svg>
            </div>
            <div class="btn-next" wire:loading.class="disable" wire:click="skipCaracters(4)">
                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#F3F3F3"><path d="m309.67-81.33-61-61.67L587-481.33 248.67-819.67l61-61.66 400 400-400 400Z"/></svg>    
            </div>
        </div>

        <div class="main-footer">
            <div>
                <p class="text-white">Status</p>
                <div>
                    <label class="text-white form-label" for="radio-status">Alive:</label>
                    <input class="form-check-input" type="radio" name="radio-status" value="alive" wire:loading.class="disable" wire:model="status" wire:click="setFilters()">
                </div>
                <div>
                    <label class="text-white form-label" for="radio-status">Dead:</label>
                    <input class="form-check-input" type="radio" name="radio-status" value="dead" wire:loading.class="disable" wire:model="status" wire:click="setFilters()">
                </div>
                <div>
                    <label class="text-white form-label" for="radio-status">Unknown:</label>
                    <input class="form-check-input" type="radio" name="radio-status" value="unknown" wire:loading.class="disable" wire:model="status" wire:click="setFilters()">
                </div>
            </div>

            <div>
                <p class="text-white">Gender</p>
                <div>
                    <label class="text-white form-label" for="radio-gender">Female:</label>
                    <input class="form-check-input" type="radio" name="radio-gender" value="female"  wire:loading.class="disable" wire:model="gender" wire:click="setFilters()">
                </div>
                <div>
                    <label class="text-white form-label" for="radio-gender">Male:</label>
                    <input class="form-check-input" type="radio" name="radio-gender" value="male"  wire:loading.class="disable" wire:model="gender" wire:click="setFilters()">
                </div>
                <div>
                    <label class="text-white form-label" for="radio-gender">Genderless:</label>
                    <input class="form-check-input" type="radio" name="radio-gender" value="genderless" wire:loading.class="disable" wire:model="gender" wire:click="setFilters()">
                </div>
                <div>
                    <label class="text-white form-label" for="radio-gender">Unknown:</label>
                    <input class="form-check-input" type="radio" name="radio-gender" value="unknown" wire:loading.class="disable" wire:model="gender" wire:click="setFilters()">
                </div>  
            </div>

            <div>
                <p class="text-white">Specie</p>
                <div>
                    <label class="text-white form-label" for="radio-specie">Human:</label>
                    <input class="form-check-input" type="radio" name="radio-specie" value="human" wire:loading.class="disable" wire:model="specie" wire:click="setFilters()">
                </div>
                <div>
                    <label class="text-white form-label" for="radio-specie">Alien:</label>
                    <input class="form-check-input" type="radio" name="radio-specie" value="alien" wire:loading.class="disable" wire:model="specie" wire:click="setFilters()">
                </div>
                <div>
                    <label class="text-white form-label" for="radio-specie">Humanoid:</label>
                    <input class="form-check-input" type="radio" name="radio-specie" value="humanoid" wire:loading.class="disable" wire:model="specie" wire:click="setFilters()">
                </div>
            </div>
        </div>

    </div>

</div>

    

    

    <div class="mt-5 row g-5">
        <div class="col-md-6  order-md-2">
            <div class="container-characters rounded">
                <div class="characters-scrollbar">
                    @foreach ($characters as $item)

                    <a wire:click="apiShow({{$item["id"]}})" wire:loading.class="disable-characters">
                        <div class="characters rounded">
                            <div class="characters-img overflow-hidden">
                                <img class="img-fluid" src="{{$item["image"]}}" alt="img">
                            </div>
                            <div class="characters-info">
                                <h3>{{$item["name"]}} <span class="fs-5 fw-normal"> - {{$item["species"]}}</h5s>
                                </h3>
                                <p @class(['text-green'=> ($item["status"]==="Alive"), 'text-red' => ($item["status"]==="Dead")])>{{$item["status"]}}</p>
                                <div class="d-flex flex-column">
                                    <p class="character-origin m-0">Origin:</p>
                                    <span>{{$item["origin"]["name"]}}</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    @endforeach
                    <button class="btn btn-success btn-show-more" wire:loading.class="disable" wire:click="moreCharacters()">
                        <div class="d-inline">
                            Cargar más
                        </div>
                        <div wire:loading.class="spinner-border text-danger" wire:target="moreCharacters"></div>
                    </button>
                </div>

            </div>
        </div>

        <div class="col-md-6 order-md-1 bg-primary p-5 rounded">
            <div class="text-center">
                <img class="img-fluid rounded" src="{{$character->image}}" alt="">
            </div>
            <div class="row mt-5">
                <div class="col-6">
                    <div class="d-flex gap-2">
                        <p class="text-gris">Name: </p>
                        <p class="text-white">{{$character->name}}</p>
                    </div>
                    <div class="d-flex gap-2">
                        <p class="text-gris">Species: </p>
                        <p class="text-white">{{$character->species}}</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex gap-2">
                        <p class="text-gris">Gender: </p>
                        <p class="text-white">{{$character->gender}}</p>
                    </div>
                    <div class="d-flex gap-2">
                        <p class="text-gris">Location: </p>
                        <p class="text-white">{{$character->location->name}}</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>




</div>
