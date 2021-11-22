<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Repositories\BaseRepository;

/**
 * Class PatientRepository
 * @package App\Repositories
 * @version March 16, 2020, 7:54 pm UTC
*/

class PatientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ktp',
        'name',
        'dob',
        'blood_type'
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
        return Patient::class;
    }
}
