<?php

namespace App\models_milionarios;
use Illuminate\Database\Eloquent\Model;

class Organizacao extends Model
{
    protected $table = 'organizacao';
    protected $fillable = ['nome'];
}
