<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
    public function findByUser(string $username): ?User;
    public function findByEmail(string $email): ?User;
    public function revokeToken(string $token): void;
    public function saveTokenExpiration(string $token, $expiration): void;
    public function deleteUserById(int $id): void;
}
