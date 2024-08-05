<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Preguntas extends Model
{
    use HasFactory;


    public function respuestas(): HasMany
    {
        return $this->hasMany(Respuestas::class, "pregunta_id", "id");
    }
}
