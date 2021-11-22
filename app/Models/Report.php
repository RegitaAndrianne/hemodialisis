<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report
 * @package App\Models
 * @version April 15, 2020, 4:39 pm UTC
 *
 * @property \App\Models\Machine machine
 * @property \App\Models\Patient patient
 * @property \Illuminate\Database\Eloquent\Collection parameters
 * @property integer patient_id
 * @property string date_on
 * @property string time_on
 * @property string date_off
 * @property integer machine_id
 */
class Report extends Model
{
    use SoftDeletes;

    public $table = 'reports';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'patient_id',
        'date_on',
        'time_on',
        'time_off',
        'machine_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'patient_id' => 'integer',
        'date_on' => 'string',
        'time_on' => 'string',
        'time_off' => 'string',
        'machine_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function machine()
    {
        return $this->belongsTo(\App\Models\Machine::class, 'machine_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'patient_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parameters()
    {
        return $this->hasMany(\App\Models\Parameter::class, 'machine_report_id');
    }
}
