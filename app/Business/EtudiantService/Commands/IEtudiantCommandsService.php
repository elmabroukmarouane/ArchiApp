<?php

namespace App\Business\EtudiantService\Commands;

use App\Infrastructure\Models\Etudiant;


interface IEtudiantCommandsService {

    /**
     * Create a Etudiant.
     *
     * @param array $payload
     * @return Etudiant
     */
    public function create(array $payload): ?Etudiant;

    /**
     * Update existing Etudiant.
     *
     * @param int $EtudiantId
     * @param array $payload
     * @return Etudiant
     */
    public function update(int $EtudiantId, array $payload): Etudiant;

    /**
     * Delete Etudiant by id.
     *
     * @param int $EtudiantId
     * @return bool
     */
    public function deleteById(int $EtudiantId): bool;

    /**
     * Restore Etudiant by id.
     *
     * @param int $EtudiantId
     * @return bool
     */
    public function restoreById(int $EtudiantId): bool;

    /**
     * Permanently delete Etudiant by id.
     *
     * @param int $EtudiantId
     * @return bool
     */
    public function permanentlyDeleteById(int $EtudiantId): bool;
}
