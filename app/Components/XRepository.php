<?php

namespace App\Components;

use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Log;

class XRepository 
{
	private $_model;
	public function getModel()
	{
		return $this->_model;
	}

	public function setModel($model)
	{
		$this->_model = $model;

		return $this->_model;
	}

	public function create($data)
	{
		try {
			Log::info('Trace in '.__METHOD__);

			$model = new $this->_model;
			$model->validate($data, 'create');
			$model->fill($data);
			$model->save();

			return $model;
		} catch (Exception $e) {
			Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
			throw $e;
		}
	}

	public function update($model, $data)
	{
		try {
			Log::info('Trace in '.__METHOD__);

			$model->validate($data, $model->rules['update']);
			$model->fill($data);
			$model->save();

			return $model;
		} catch (Exception $e) {
			Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
			throw $e;
		}
	}
}