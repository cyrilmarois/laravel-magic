<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
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

			//
	    } catch(Exception $e) {
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
	    	
	    	$user = $this->_userRepository->create($request->all());

	        return Response()->json($user, Response::HTTP_CREATED);
	    } catch(Exception $e) {
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

			//
	    } catch(Exception $e) {
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
	    } catch(Exception $e) {
	    	Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
	    	throw $e;
	    }
    }
}
