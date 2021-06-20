<?php

namespace App\Business\EtudiantService\Queries;

use App\Infrastructure\Models\Etudiant;
use Illuminate\Database\Eloquent\Collection;


interface IEtudiantQueriesService {
    /**
     * Get all Etudiants.
     *
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * Get all trashed Etudiants.
     *
     * @return Collection
     */
    public function allTrashed(): Collection;

    /**
     * Find Etudiant by id.
     *
     * @param int $EtudiantId
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Etudiant
     */
    public function findById(
        int $EtudiantId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Etudiant;

    /**
     * Find trashed Etudiant by id.
     *
     * @param int $EtudiantId
     * @return Etudiant
     */
    public function findTrashedById(int $EtudiantId): ?Etudiant;

    /**
     * Find only trashed Etudiant by id.
     *
     * @param int $EtudiantId
     * @return Etudiant
     */
    public function findOnlyTrashedById(int $EtudiantId): ?Etudiant;

    /**
     * Select by SQL Query
     *
     * @param $query
     * @param array $paramsQuery
     * @return array
    */
    public function selectByQuery($query, array $paramsQuery = []): array;
}
