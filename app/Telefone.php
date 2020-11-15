<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = 'telefones';
    protected $fillable = [
        'email', 'telefone', 'cartorio_id'
    ];
}
