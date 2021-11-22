<?php

namespace App\Repositories;

use App\Models\Report;
use App\Repositories\BaseRepository;

/**
 * Class ReportRepository
 * @package App\Repositories
 * @version April 15, 2020, 4:39 pm UTC
*/

class ReportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'patient_id',
        'date_on',
        'time_on',
        'time_off',
        'machine_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Report::class;
    }
}
