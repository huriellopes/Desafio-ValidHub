<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = "tipo_documentos";

    protected $primaryKey = "id";

    protected $fillable = [
        'tipo',
        'documento'
    ];
}
