<?php

namespace App\Business\EtudiantService\Commands;

use App\Infrastructure\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;
use App\Domain\EtudiantRepository\IEtudiantRepository;
use App\Business\EtudiantService\Commands\IEtudiantCommandsService;

class EtudiantCommandsService implements IEtudiantCommandsService
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
     * Create a Etudiant.
     *
     * @param array $payload
     * @return Etudiant
     */
    public function create(array $payload): ?Etudiant
    {
        return $this->EtudiantRepository->create($payload);
    }

    /**
     * Update existing Etudiant.
     *
     * @param int $EtudiantId
     * @param array $payload
     * @return Etudiant
     */
    public function update(int $EtudiantId, array $payload): Etudiant
    {
        return $this->EtudiantRepository->update($EtudiantId, $payload);
    }

    /**
     * Delete Etudiant by id.
     *
     * @param int $EtudiantId
     * @return bool
     */
    public function deleteById(int $EtudiantId): bool
    {
        return $this->EtudiantRepository->deleteById($EtudiantId);
    }

    /**
     * Restore Etudiant by id.
     *
     * @param int $EtudiantId
     * @return bool
     */
    public function restoreById(int $EtudiantId): bool
    {
        return $this->EtudiantRepository->restoreById($EtudiantId);
    }

    /**
     * Permanently delete Etudiant by id.
     *
     * @param int $EtudiantRepositoEtudiantIdryId
     * @return bool
     */
    public function permanentlyDeleteById(int $EtudiantId): bool
    {
        return $this->EtudiantRepository->permanentlyDeleteById($EtudiantId);
    }
}
