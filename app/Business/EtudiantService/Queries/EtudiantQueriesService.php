<?php

namespace App\Business\EtudiantService\Queries;

use App\Infrastructure\Models\Etudiant;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\EtudiantRepository\IEtudiantRepository;
use App\Business\EtudiantService\Queries\IEtudiantQueriesService;

class EtudiantQueriesService implements IEtudiantQueriesService
{
    /**
     * @var IEtudiantRepository
     */
    protected $EtudiantRepository;

    /**
     * EtudiantRepository constructor.
     *
     * @param IEtudiantRepository $EtudiantRepository
     */
    public function __construct(IEtudiantRepository $EtudiantRepository)
    {
        $this->EtudiantRepository = $EtudiantRepository;
    }

    /**
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->EtudiantRepository->all($columns, $relations);
    }

    /**
     * Get all trashed EtudiantRepositorys.
     *
     * @return Collection
     */
    public function allTrashed(): Collection
    {
        return $this->EtudiantRepository->allTrashed();
    }

    /**
     * Find EtudiantId by id.
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
    ): ?Etudiant {
        return $this->EtudiantRepository->findById($EtudiantId, $columns, $relations, $appends);
    }

    /**
     * Find trashed Etudiant by id.
     *
     * @param int $EtudiantId
     * @return Etudiant
     */
    public function findTrashedById(int $EtudiantId): ?Etudiant
    {
        return $this->EtudiantRepository->findTrashedById($EtudiantId);
    }

    /**
     * Find only trashed Etudiant by id.
     *
     * @param int $EtudiantId
     * @return Etudiant
     */
    public function findOnlyTrashedById(int $EtudiantId): ?Etudiant
    {
        return $this->EtudiantRepository->findOnlyTrashedById($EtudiantId);
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
        return $this->EtudiantRepository->selectByQuery($query, $paramsQuery);
    }
}
