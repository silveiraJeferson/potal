<?php

namespace App\models_milionarios;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model {

    public $timestamps = false;
    protected $table = 'grupo';
    protected $fillable = ['nome'];

}
