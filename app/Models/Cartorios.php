<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartorios extends Model
{
    protected $table = 'cartorios';

    protected $fillable = [
        'nome',
        'razao',
        'tipo_documento',
        'documento',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'uf',
        'tabeliao',
        'ativo',
    ];
}
