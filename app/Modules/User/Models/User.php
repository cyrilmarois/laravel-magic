<?php

namespace App\Modules\User\Models;

use App\Helpers\ArrayHelper;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    public $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name',
        'nick_name',
        'email', 
        'password',
        'birthday',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'birthday' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public static $rules = [
        'create' => [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nick_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6|confirmed',
            'status' => 'boolean',
            'birthday' => 'date',
        ],
        'update' => [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nick_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,id',
            'password' => 'required|string|min:6|confirmed',
            'status' => 'boolean',
            'birthday' => 'date',            
        ],
    ];

    public function validate($data, $scenario)
    {
        $result = false;
        $rules = ArrayHelper::check($scenario, static::$rules);
        if (!is_null($rules)) {
            $result = Validator::make($data, $rules);
        }
        
        return $result;
    }
}
