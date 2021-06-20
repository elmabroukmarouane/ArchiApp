<?php

namespace App\Business\PersonneService\Commands;

use App\Infrastructure\Models\Personne;
use Illuminate\Database\Eloquent\Model;
use App\Domain\PersonneRepository\IPersonneRepository;
use App\Business\PersonneService\Commands\IPersonneCommandsService;

class PersonneCommandsService implements IPersonneCommandsService
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
     * Create a Personne.
     *
     * @param array $payload
     * @return Personne
     */
    public function create(array $payload): ?Personne
    {
        return $this->PersonneRepository->create($payload);
    }

    /**
     * Update existing Personne.
     *
     * @param int $PersonneId
     * @param array $payload
     * @return Personne
     */
    public function update(int $PersonneId, array $payload): Personne
    {
        return $this->PersonneRepository->update($PersonneId, $payload);
    }

    /**
     * Delete Personne by id.
     *
     * @param int $PersonneId
     * @return bool
     */
    public function deleteById(int $PersonneId): bool
    {
        return $this->PersonneRepository->deleteById($PersonneId);
    }

    /**
     * Restore Personne by id.
     *
     * @param int $PersonneId
     * @return bool
     */
    public function restoreById(int $PersonneId): bool
    {
        return $this->PersonneRepository->restoreById($PersonneId);
    }

    /**
     * Permanently delete Personne by id.
     *
     * @param int $PersonneRepositoPersonneIdryId
     * @return bool
     */
    public function permanentlyDeleteById(int $PersonneId): bool
    {
        return $this->PersonneRepository->permanentlyDeleteById($PersonneId);
    }
}
