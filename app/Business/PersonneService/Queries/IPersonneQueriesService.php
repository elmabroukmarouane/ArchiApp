<?php

namespace App\Business\PersonneService\Queries;

use App\Infrastructure\Models\Personne;
use Illuminate\Database\Eloquent\Collection;


interface IPersonneQueriesService {
    /**
     * Get all Personnes.
     *
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * Get all trashed Personnes.
     *
     * @return Collection
     */
    public function allTrashed(): Collection;

    /**
     * Find Personne by id.
     *
     * @param int $PersonneId
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Personne
     */
    public function findById(
        int $PersonneId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Personne;

    /**
     * Find trashed Personne by id.
     *
     * @param int $PersonneId
     * @return Personne
     */
    public function findTrashedById(int $PersonneId): ?Personne;

    /**
     * Find only trashed Personne by id.
     *
     * @param int $PersonneId
     * @return Personne
     */
    public function findOnlyTrashedById(int $PersonneId): ?Personne;

    /**
     * Select by SQL Query
     *
     * @param $query
     * @param array $paramsQuery
     * @return array
    */
    public function selectByQuery($query, array $paramsQuery = []): array;
}
