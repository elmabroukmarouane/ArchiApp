<?php

namespace App\Business\UserService\Queries;

use App\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Collection;


interface IUserQueriesService {
    /**
     * Get all Users.
     *
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * Get all trashed Users.
     *
     * @return Collection
     */
    public function allTrashed(): Collection;

    /**
     * Find User by id.
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
    ): ?User;

    /**
     * Find trashed User by id.
     *
     * @param int $UserId
     * @return User
     */
    public function findTrashedById(int $UserId): ?User;

    /**
     * Find only trashed User by id.
     *
     * @param int $UserId
     * @return User
     */
    public function findOnlyTrashedById(int $UserId): ?User;

    /**
     * Select by SQL Query
     *
     * @param $query
     * @param array $paramsQuery
     * @return array
    */
    public function selectByQuery($query, array $paramsQuery = []): array;
}
