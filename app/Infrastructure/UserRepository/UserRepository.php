<?php

namespace App\Repository\Eloquent;

use App\Infrastructure\UserRepository\IUserRepository;
use App\Infrastucture\BaseRepository\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements IUserRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
