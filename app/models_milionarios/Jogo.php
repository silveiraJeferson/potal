<?php

namespace App\models_milionarios;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    protected $fillable = ['concurso','data','numeros'];
}
