<?php

namespace App\Modules\User\Repositories;

use App\Components\XRepository;
use App\Modules\User\Models\User;

class UserRepository extends XRepository
{
	public function __construct()
	{
		$this->setModel(User::class);
	}
}