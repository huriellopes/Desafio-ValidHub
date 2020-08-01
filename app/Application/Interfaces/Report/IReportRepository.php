<?php

namespace App\Application\Interfaces\Report;

use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface IReportRepository
{
    /**
     * @param stdClass $params
     * @return Collection
     */
    public function reportBetweenDate(stdClass $params) : Collection;
}
