<?php

namespace App\Business\UserService\Queries;

use App\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\UserRepository\IUserRepository;
use App\Business\UserService\Queries\IUserQueriesService;

class UserQueriesService implements IUserQueriesService
{
    /**
     * @var IUserRepository
     */
    protected $UserRepository;

    /**
     * UserRepository constructor.
     *
     * @param IUserRepository $UserRepository
     */
    public function __construct(IUserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->UserRepository->all($columns, $relations);
    }

    /**
     * Get all trashed UserRepositorys.
     *
     * @return Collection
     */
    public function allTrashed(): Collection
    {
        return $this->UserRepository->allTrashed();
    }

    /**
     * Find UserId by id.
     *
     * @param int $UserId
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return User
     */
    public function findById(
        int $UserId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?User {
        return $this->UserRepository->findById($UserId, $columns, $relations, $appends);
    }

    /**
     * Find trashed User by id.
     *
     * @param int $UserId
     * @return User
     */
    public function findTrashedById(int $UserId): ?User
    {
        return $this->UserRepository->findTrashedById($UserId);
    }

    /**
     * Find only trashed User by id.
     *
     * @param int $UserId
     * @return User
     */
    public function findOnlyTrashedById(int $UserId): ?User
    {
        return $this->UserRepository->findOnlyTrashedById($UserId);
    }

    /**
     * Select by SQL Query
     *
     * @param $query
     * @param array $paramsQuery
     * @return array
    */
    public function selectByQuery($query, array $paramsQuery = []): array
    {
        return $this->UserRepository->selectByQuery($query, $paramsQuery);
    }
}
