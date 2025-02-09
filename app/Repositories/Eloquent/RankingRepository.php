<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\RankingRepositoryInterface;

class RankingRepository implements RankingRepositoryInterface
{
    public function getRankingByMovementId($movementId)
    {
        return DB::table('personal_records')
            ->join('users', 'personal_records.usu_id', '=', 'users.id')
            ->select(
                'users.id as usu_id',
                'users.name as name',
                DB::raw('MAX(personal_records.value) as max_value'),
                DB::raw('MIN(personal_records.date) as date'),
                DB::raw('DENSE_RANK() OVER (ORDER BY MAX(personal_records.value) DESC) as posicao')
            )
            ->where('personal_records.move_id', $movementId)
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('max_value')
            ->get();
    }
}
