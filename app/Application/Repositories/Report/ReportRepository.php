<?php

namespace App\Application\Repositories\Report;

use App\Application\Interfaces\Report\IReportRepository;
use App\Models\Cartorios;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class ReportRepository implements IReportRepository
{
    /**
     * @param stdClass $params
     * @return Collection
     */
    public function reportBetweenDate(stdClass $params): Collection
    {
        return Cartorios::with('tipodocumento','OwnerCreated')
            ->where('uf', $params->uf)
            ->whereBetween('created_at', [$params->date_start, $params->date_end])
//            ->where(, '>=', )
//            ->where('created_at', '<=', )
            ->get();
    }
}
