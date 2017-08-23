<?php

namespace App\Components;

use Illuminate\Http\Exceptions\HttpResponseException;
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
		} catch (HttpResponseException $e) {
			Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
			return $e->getResponse();
		}
	}

	public function update($model, $data)
	{
		try {
			Log::info('Trace in '.__METHOD__);

			$data['id'] = $model->id;
			$model->validate($data, 'update');
			$model->fill($data);
			$model->save();

			return $model;
		} catch (HttpResponseException $e) {
			Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
			return $e->getResponse();
		}
	}

	public function all()
	{
		try {
			Log::info('Trace in '.__METHOD__);

			return ['data' => $this->_model::all()];
		} catch (HttpResponseException $e) {
			Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
			return $e->getResponse();
		}
	}

	public function one($id)
	{
		try {
			Log::info('Trace in '.__METHOD__);

			return $this->_model::find($id);
		} catch (HttpResponseException $e) {
			Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
			return $e->getResponse();
		}
	}
}