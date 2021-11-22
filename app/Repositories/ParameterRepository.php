<?php

namespace App\Repositories;

use App\Models\Parameter;
use App\Repositories\BaseRepository;

/**
 * Class ParameterRepository
 * @package App\Repositories
 * @version April 15, 2020, 3:48 pm UTC
*/

class ParameterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'arterial_press',
        'venous_press',
        'dyalizate_press',
        'temperature',
        'conductivity',
        'sodium',
        'bicarbonate',
        'uf_remove',
        'uf_objective',
        'uf_rate',
        'time',
        'fluid',
        'warning',
        'machine_report_id'
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
        return Parameter::class;
    }
}
