<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartorio extends Model
{
    protected $table = 'cartorios';
    protected $fillable = [
         'nome', 'razao', 'documento', 'tabeliao', 'ativo'
    ];

}
