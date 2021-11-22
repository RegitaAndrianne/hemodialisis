<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version March 15, 2020, 2:32 pm UTC
 *
 * @property string name
 * @property string role
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 */
// class User extends Model
class user extends Authenticable
{
    use Notifiable;
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'role',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'patient_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'role' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'patient_id'=>'string',
        'status'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        // 'password' => 'required'
    ];

    
}
