<?php

namespace App\Repositories\Interfaces;

use App\Models\Usuario;

interface UserRepositoryInterface
{
    public function create(array $data): Usuario;
    public function findByUser(string $username): ?Usuario;
    public function findByEmail(string $email): ?Usuario;
    public function revokeToken(string $token): void;
    public function saveTokenExpiration(string $token, $expiration): void;
    public function deleteUserById(int $id): void;
}
