<?php

namespace App\Application\Validates\Report;

use App\Application\Validates\Validate;

class ReportValidate extends Validate
{
    protected $rules = [
        'date_start' => 'required|date',
        'date_end' => 'required|date'
    ];
}
