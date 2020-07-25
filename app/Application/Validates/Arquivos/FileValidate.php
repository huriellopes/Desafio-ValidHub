<?php

namespace App\Application\Validates\Arquivos;

use App\Application\Validates\Validate;

class FileValidate extends Validate
{
    protected $rules = [
        'AXMLC' => 'required|bail|mimetypes:application/xml,text/plain,text/xml|max:2000',
    ];
}
