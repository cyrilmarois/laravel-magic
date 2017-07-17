<?php

namespace App\Modules\User\Models;

use App\Exceptions\Handler;
use App\Helpers\ArrayHelper;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;
use Symfony\Component\HttpFoundation\Response;

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
            'nick_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6|confirmed',
            'status' => 'nullable|boolean',
            'birthday' => 'nullable|date',
        ],
        'update' => [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'nick_name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:user,id',
            'password' => 'nullable|string|min:6|confirmed',
            'status' => 'nullable|boolean',
            'birthday' => 'nullable|date',            
        ],
    ];

    public function validate($data, $scenario)
    {
        try {
            Log::info('Trace in '.__METHOD__);

            $rules = ArrayHelper::check($scenario, static::$rules);
            if (!is_null($rules)) {
                $validation = Validator::make($data, $rules);
                if ($validation->fails()) {
                    $errors = $validation->getMessageBag()->all();
                    $errors = implode(',', $errors);
                    $response = Response()->json($errors, Response::HTTP_BAD_REQUEST); 
                    throw new HttpResponseException($response);
               }
            } else {
                $response = Response()->json('Missing scenario\'s rules', Response::HTTP_INTERNAL_SERVER_ERROR); 
                throw new HttpResponseException($response, Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch(HttpResponseException $e) {
            Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
            throw $e;
        }
    }
}
