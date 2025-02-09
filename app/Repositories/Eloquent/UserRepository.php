<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function findByUser(string $username): ?User
    {
        return User::where('email', $username)->orWhere('name', $username)->first();
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function revokeToken(string $token): void
    {
        DB::table('personal_access_tokens')
            ->where('token', hash('sha256', $token))
            ->delete();
    }

    public function saveTokenExpiration(string $token, $expiration): void
    {
        DB::table('personal_access_tokens')
            ->where('token', hash('sha256', $token))
            ->update(['expires_at' => $expiration]);
    }

    public function deleteUserById(int $id): void
    {
        User::where('id', $id)->delete();
    }
}
