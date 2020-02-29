<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Orcamento extends Model
{
    use Sortable;
    protected $fillable = [
        'cliente', 'vendedor', 'descricao', 'valor'
    ];
    public $sortable = ['id', 'cliente', 'vendedor', 'created_at', 'valor'];
}
