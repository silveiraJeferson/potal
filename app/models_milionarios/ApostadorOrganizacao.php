<?php

namespace App\models_milionarios;

use Illuminate\Database\Eloquent\Model;

class ApostadorOrganizacao extends Model {
    public $timestamps = false;
    protected $table = 'apostador_organizacao';
    protected $fillable = [ 'apostador_id', 'organizacao_id'];

}
