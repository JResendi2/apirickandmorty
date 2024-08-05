<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    use HasFactory;

    public function pregunta()
    {
        return $this->belongsTo(Preguntas::class, 'pregunta_id', 'id');
    }
}
