<?php

namespace App\Application\Services\Report;

use App\Application\Interfaces\Report\IReportRepository;
use App\Application\Interfaces\Report\IReportService;
use App\Application\Validates\Report\ReportValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Exception;

class ReportService implements IReportService
{
    /**
     * @var IReportRepository
     * @var ReportValidate
     */
    protected $IReportRepository;
    protected $ReportValidate;

    /**
     * ReportService constructor.
     * @param IReportRepository $IReportRepository
     * @param ReportValidate $ReportValidate
     */
    public function __construct(IReportRepository $IReportRepository,
                                ReportValidate $ReportValidate)
    {
        $this->IReportRepository = $IReportRepository;
        $this->ReportValidate = $ReportValidate;
    }

    /**
     * @param stdClass $params
     * @return Collection
     * @throws Exception
     */
    public function reportBetweenDate(stdClass $params): Collection
    {
        $this->getReportValidate()->validaParametros($params);

        return $this->IReportRepository->reportBetweenDate($params);
    }

    /**
     * @return ReportValidate
     */
    public function getReportValidate() : ReportValidate
    {
        return $this->ReportValidate;
    }
}
