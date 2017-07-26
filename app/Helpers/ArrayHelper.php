<?php

namespace App\Helpers;

class ArrayHelper
{
	public static function check($key, $array)
	{
		$result = null;
		if (isset($array[$key]) || array_key_exists($array[$key])) {
			$result = $array[$key];
		}

		return $result;
	}
}