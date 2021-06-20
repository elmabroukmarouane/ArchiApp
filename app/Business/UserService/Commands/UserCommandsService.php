<?php

namespace App\Business\UserService\Commands;

use App\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Domain\UserRepository\IUserRepository;
use App\Business\UserService\Commands\IUserCommandsService;

class UserCommandsService implements IUserCommandsService
{
    /**
     * @var IUserRepository
     */
    protected $UserRepository;

    /**
     * UserRepository constructor.
     *
     * @param IUserRepository $UserRepository
     */
    public function __construct(IUserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * Create a User.
     *
     * @param array $payload
     * @return User
     */
    public function create(array $payload): ?User
    {
        return $this->UserRepository->create($payload);
    }

    /**
     * Update existing User.
     *
     * @param int $UserId
     * @param array $payload
     * @return User
     */
    public function update(int $UserId, array $payload): User
    {
        return $this->UserRepository->update($UserId, $payload);
    }

    /**
     * Delete User by id.
     *
     * @param int $UserId
     * @return bool
     */
    public function deleteById(int $UserId): bool
    {
        return $this->UserRepository->deleteById($UserId);
    }

    /**
     * Restore User by id.
     *
     * @param int $UserId
     * @return bool
     */
    public function restoreById(int $UserId): bool
    {
        return $this->UserRepository->restoreById($UserId);
    }

    /**
     * Permanently delete User by id.
     *
     * @param int $UserRepositoUserIdryId
     * @return bool
     */
    public function permanentlyDeleteById(int $UserId): bool
    {
        return $this->UserRepository->permanentlyDeleteById($UserId);
    }
}
