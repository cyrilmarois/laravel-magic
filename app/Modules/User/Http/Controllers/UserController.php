<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\User\Models\User;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
	private $_userId;
	private $_currentUser;
	private $_userRepository;

	public function __construct()
	{
		$this->_userRepository = new UserRepository();
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	try {
    		Log::info('Trace in '.__METHOD__);

			$users = $this->_userRepository->all();
			
			return Response()->json($users, Response::HTTP_OK);
	    } catch(\Exception $e) {
	    	Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
	    	throw $e;
	    }
    }

    /**
     * Display a one resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    	try {
    		Log::info('Trace in '.__METHOD__);

			$id = (int)Route::current()->id ?: null;
			$user = $this->_userRepository->one($id);
			
			return Response()->json($user, Response::HTTP_OK);
	    } catch(\Exception $e) {
	    	Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
	    	throw $e;
	    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	try {
    		Log::info('Trace in '.__METHOD__);
	    	
	    	$user = $this->_userRepository->create($request->input());
	    	
	    	return Response()->json($user, Response::HTTP_CREATED);
	    } catch(\Exception $e) {
	    	Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
	    	throw $e;
	    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
    		Log::info('Trace in '.__METHOD__);

			$this->init();
			$user = $this->_userRepository->update(
				$this->_currentUser, 
				$request->input()
			);

	        return Response()->json($user, Response::HTTP_OK);
	    } catch(\Exception $e) {
	    	Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
	    	throw $e;
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
    		Log::info('Trace in '.__METHOD__);

			//
	    } catch(\Exception $e) {
	    	Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
	    	throw $e;
	    }
    }

    public function init()
    {
    	try {
    		Log::info('Trace in '.__METHOD__);

			$this->_userId = (int)Route::current()->id ?: null;
			if (!is_null($this->_userId)) {
				$this->_currentUser = User::findOrFail($this->_userId);
			}
	    } catch(\Exception $e) {
	    	Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
	    	throw $e;
	    }
    }
}
