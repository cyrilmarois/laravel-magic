<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Helpers\ArrayHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Auth\Repositories\AuthRepository;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->_authRepository = new AuthRepository();
        $this->_userRepository = new UserRepository();
    }

    public function login(Request $request)
    {
        try {
            Log::info('Trace in '.__METHOD__);

            $input = $request->input();
            $email = ArrayHelper::check('email', $input);
            $user = $this->_userRepository->getUserByEmail($email);
            $this->_authRepository->login($input);

            return Response()->json($user, Response::HTTP_OK);
        } catch(HttpResponseException $e) {
            Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
            return $e->getResponse();
        }
    }

    public function logout()
    {
        try {
            Log::info('Trace in '.__METHOD__);
    
            return Response()->json(Auth::logout(), Response::HTTP_OK);
        } catch(HttpResponseException $e) {
            Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
            return $e->getResponse();
        }
    }

    public function isAuthenticated()
    {
        try {
            Log::info('Trace in '.__METHOD__);
    
            return Response()->json(Auth::check(), Response::HTTP_OK);
        } catch(HttpResponseException $e) {
            Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
            return $e->getResponse();
        }
    }
}
