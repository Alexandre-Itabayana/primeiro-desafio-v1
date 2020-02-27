<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $fillable = [
        'cliente', 'vendedor', 'descricao', 'valor'
    ];
}
