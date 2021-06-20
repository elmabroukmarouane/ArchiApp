<?php

namespace App\Business\PersonneService\Queries;

use App\Infrastructure\Models\Personne;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\PersonneRepository\IPersonneRepository;
use App\Business\PersonneService\Queries\IPersonneQueriesService;

class PersonneQueriesService implements IPersonneQueriesService
{
    /**
     * @var IPersonneRepository
     */
    protected $PersonneRepository;

    /**
     * PersonneRepository constructor.
     *
     * @param IPersonneRepository $PersonneRepository
     */
    public function __construct(IPersonneRepository $PersonneRepository)
    {
        $this->PersonneRepository = $PersonneRepository;
    }

    /**
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->PersonneRepository->all($columns, $relations);
    }

    /**
     * Get all trashed PersonneRepositorys.
     *
     * @return Collection
     */
    public function allTrashed(): Collection
    {
        return $this->PersonneRepository->allTrashed();
    }

    /**
     * Find PersonneId by id.
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
    ): ?Personne {
        return $this->PersonneRepository->findById($PersonneId, $columns, $relations, $appends);
    }

    /**
     * Find trashed Personne by id.
     *
     * @param int $PersonneId
     * @return Personne
     */
    public function findTrashedById(int $PersonneId): ?Personne
    {
        return $this->PersonneRepository->findTrashedById($PersonneId);
    }

    /**
     * Find only trashed Personne by id.
     *
     * @param int $PersonneId
     * @return Personne
     */
    public function findOnlyTrashedById(int $PersonneId): ?Personne
    {
        return $this->PersonneRepository->findOnlyTrashedById($PersonneId);
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
        return $this->PersonneRepository->selectByQuery($query, $paramsQuery);
    }
}
