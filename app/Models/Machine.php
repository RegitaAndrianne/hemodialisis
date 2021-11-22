<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Machine
 * @package App\Models
 * @version April 15, 2020, 3:38 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection reports
 * @property string nama
 * @property string type
 */
class Machine extends Model
{
    use SoftDeletes;

    public $table = 'machines';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reports()
    {
        return $this->hasMany(\App\Models\Report::class, 'machine_id');
    }
}
