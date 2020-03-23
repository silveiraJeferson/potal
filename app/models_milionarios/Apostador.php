<?php

namespace App\models_milionarios;

use Illuminate\Database\Eloquent\Model;

class Apostador extends Model {

    protected $table = 'apostador';
    protected $fillable = ['nome', 'apelido', 'organizacao_id'];

}
