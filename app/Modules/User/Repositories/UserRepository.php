<?php

namespace App\Modules\User\Repositories;

use App\Components\XRepository;
use App\Exceptions\Handler;
use App\Helpers\ArrayHelper;
use App\Modules\User\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserRepository extends XRepository
{
	public function __construct()
	{
		$this->setModel(User::class);
	}

	public function create($data)
	{
		try {
			Log::info('Trace in '.__METHOD__);

			$model = $this->getModel();
			$model = new $model;
			$model->validate($data, 'create');
			$password = ArrayHelper::check('password', $data);
			$data['password'] = bcrypt($password);
			$model->fill($data);
			$model->save();

			return $model;
		} catch (\Exception $e) {
			Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
			throw $e;
		}
	}

	public function update($model, $data)
	{
		try {
			Log::info('Trace in '.__METHOD__);

			$data['id'] = $model->id;
			$validate = $model->validate($data, 'update');
			$password = ArrayHelper::check('password', $data);
			if (!is_null($password)) {
				$data['password'] = bcrypt($password);
			}
			$model->update($data);

			return $model;
		} catch (\Exception $e) {
			Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
			throw $e;
		}
	}

	public function getUserByEmail($email)
	{
		try {
			Log::info('Trace in '.__METHOD__);

			$user = User::whereEmail($email)->first();
			if (is_null($user)) {
				$response = Response()->json('User not found', Response::HTTP_NOT_FOUND);
				throw new HttpResponseException($response, Response::HTTP_NOT_FOUND);
			}

			return $user;
		} catch (HttpResponseException $e) {
			Log::error('Error in '.__METHOD__, ['message' => $e->getMessage()]);
			throw $e;
		}
	}
}