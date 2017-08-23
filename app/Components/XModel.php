<?php

namespace App\Components;

use App\Helpers\ArrayHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class XModel extends Model
{
	protected static $rules;

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
            return $e->getResponse();
        }
    }

    public static function findBySlug($slug)
    {
        try {
            Log::info('Trace in '.__METHOD__);
    
            $model = static::class;

            return $model::whereSlug($slug)->first();
        } catch(HttpResponseException $e) {
            Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
            return $e->getResponse();
        }
    }
}