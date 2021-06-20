<?php

namespace App\Business\UserService\Commands;

use App\Infrastructure\Models\User;


interface IUserCommandsService {

    /**
     * Create a User.
     *
     * @param array $payload
     * @return User
     */
    public function create(array $payload): ?User;

    /**
     * Update existing User.
     *
     * @param int $UserId
     * @param array $payload
     * @return User
     */
    public function update(int $UserId, array $payload): User;

    /**
     * Delete User by id.
     *
     * @param int $UserId
     * @return bool
     */
    public function deleteById(int $UserId): bool;

    /**
     * Restore User by id.
     *
     * @param int $UserId
     * @return bool
     */
    public function restoreById(int $UserId): bool;

    /**
     * Permanently delete User by id.
     *
     * @param int $UserId
     * @return bool
     */
    public function permanentlyDeleteById(int $UserId): bool;
}
