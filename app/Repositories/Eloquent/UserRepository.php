<?php

namespace App\Repositories\Eloquent;

use App\Models\Usuario;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): Usuario
    {
        return Usuario::create([
            'nome' => $data['name'],
            'email' => $data['email'],
            'senha' => bcrypt($data['password']),
        ]);
    }

    public function findByUser(string $username): ?Usuario
    {
        return Usuario::where('email', $username)->orWhere('nome', $username)->first();
    }

    public function findByEmail(string $email): ?Usuario
    {
        return Usuario::where('email', $email)->first();
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
        Usuario::where('id', $id)->delete();
    }
}
