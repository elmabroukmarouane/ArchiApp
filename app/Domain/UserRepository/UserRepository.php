<?php

namespace App\Repository\Eloquent;

use App\Domain\UserRepository\IUserRepository;
use App\Domain\BaseRepository\BaseRepository;
use App\Infrastructure\Models\User;

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
