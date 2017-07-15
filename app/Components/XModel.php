<?php

namespace App\Components;

use Illuminate\Database\Eloquent\Model;

class XModel extends Model
{
	protected static $rules;

    public function validate($data, $rules)
    {
    	$result = false;
        $rules = ArrayHelper::check($scenario, static::$rules);
        if (!is_null($rules)) {
            $result = Validator::make($data, $rules);
        }
        
        return $result;
    }
}