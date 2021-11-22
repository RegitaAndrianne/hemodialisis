<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Parameter
 * @package App\Models
 * @version April 15, 2020, 3:48 pm UTC
 *
 * @property \App\Models\Report machineReport
 * @property string arterial_press
 * @property string venous_press
 * @property string dyalizate_press
 * @property string temperature
 * @property string conductivity
 * @property string sodium
 * @property string bicarbonate
 * @property string uf_remove
 * @property string uf_objective
 * @property string uf_rate
 * @property string time
 * @property string fluid
 * @property string warning
 * @property integer machine_report_id
 */
class Parameter extends Model
{
    use SoftDeletes;

    public $table = 'parameters';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'arterial_press' => 'string',
        'venous_press' => 'string',
        'dyalizate_press' => 'string',
        'temperature' => 'string',
        'conductivity' => 'string',
        'sodium' => 'string',
        'bicarbonate' => 'string',
        'uf_remove' => 'string',
        'uf_objective' => 'string',
        'uf_rate' => 'string',
        'time' => 'string',
        'fluid' => 'string',
        'warning' => 'string',
        'machine_report_id' => 'integer'
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
    public function machineReport()
    {
        return $this->belongsTo(\App\Models\Report::class, 'machine_report_id');
    }
}
