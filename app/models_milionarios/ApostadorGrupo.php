<?php

namespace App\models_milionarios;

use Illuminate\Database\Eloquent\Model;

class ApostadorGrupo extends Model
{
      public $timestamps = false;
    protected $table = 'apostador_grupo';
    protected $fillable = [ 'apostador_id', 'grupo_id'];
}


