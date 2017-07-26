<?php

namespace App\Modules\Auth\Repositories;

use App\Components\XRepository;
use App\Helpers\ArrayHelper;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuthRepository extends XRepository
{
	public function login($input)
    {
        try {
            Log::info('Trace in '.__METHOD__);
            
            $email = ArrayHelper::check('email', $input);
            $password = ArrayHelper::check('password', $input);
            $credentials = ['email' => $email, 'password' => $password, 'status' => 1];
            if (!Auth::attempt($credentials)) {
            	$response = Response()->json('Invalid credentials', Response::HTTP_BAD_REQUEST);
                throw new HttpResponseException($response, Response::HTTP_BAD_REQUEST);
            }
        } catch(HttpResponseException $e) {
            Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
            return $e->getResponse();
        }
    }
}