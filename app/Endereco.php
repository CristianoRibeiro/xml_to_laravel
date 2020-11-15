<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';
    protected $fillable = [
        'cep', 'endereco', 'bairro', 'cidade', 'uf', 'estado_id', 'cartorio_id'
    ];
}
