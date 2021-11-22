<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Patient
 * @package App\Models
 * @version March 16, 2020, 7:54 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection reports
 * @property string ktp
 * @property string name
 * @property string dob
 * @property string blood_type
 */
class Patient extends Model
{
    use SoftDeletes;

    public $table = 'patients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'ktp',
        'name',
        'dob',
        'blood_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'ktp' => 'string',
        'name' => 'string',
        'dob' => 'string',
        'blood_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ktp' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reports()
    {
        return $this->hasMany(\App\Models\Report::class, 'patient_id');
    }
}
