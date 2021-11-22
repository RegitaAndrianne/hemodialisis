<?php

namespace App\Repositories;

use App\Models\Machine;
use App\Repositories\BaseRepository;

/**
 * Class MachineRepository
 * @package App\Repositories
 * @version April 15, 2020, 3:38 pm UTC
*/

class MachineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type'
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
        return Machine::class;
    }
}
