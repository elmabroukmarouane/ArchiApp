<?php

namespace App\Business\PersonneService\Commands;

use App\Infrastructure\Models\Personne;


interface IPersonneCommandsService {

    /**
     * Create a Personne.
     *
     * @param array $payload
     * @return Personne
     */
    public function create(array $payload): ?Personne;

    /**
     * Update existing Personne.
     *
     * @param int $PersonneId
     * @param array $payload
     * @return Personne
     */
    public function update(int $PersonneId, array $payload): Personne;

    /**
     * Delete Personne by id.
     *
     * @param int $PersonneId
     * @return bool
     */
    public function deleteById(int $PersonneId): bool;

    /**
     * Restore Personne by id.
     *
     * @param int $PersonneId
     * @return bool
     */
    public function restoreById(int $PersonneId): bool;

    /**
     * Permanently delete Personne by id.
     *
     * @param int $PersonneId
     * @return bool
     */
    public function permanentlyDeleteById(int $PersonneId): bool;
}
