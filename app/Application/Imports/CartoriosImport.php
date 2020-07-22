<?php

namespace App\Application\Imports;

use App\Models\Cartorios;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class CartoriosImport implements ToModel
{
    public function model(array $row)
    {
        return new Cartorios([
            'nome' => $row[0],
        ]);
    }
}
