<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\RankingRepositoryInterface;

class RankingRepository implements RankingRepositoryInterface
{
    public function getRankingByMovementId($movementId)
    {
        return DB::table('record_pessoal')
            ->join('usuario', 'record_pessoal.usu_id', '=', 'usuario.id')
            ->select(
                'usuario.id as usu_id',
                'usuario.nome as nome',
                DB::raw('MAX(record_pessoal.value) as valor_max'),
                DB::raw('MIN(record_pessoal.date) as data')
            )
            ->where('record_pessoal.movimento_id', $movementId)
            ->groupBy('usuario.id', 'usuario.nome')
            ->orderByDesc('valor_max')
            ->get()->limit(10);
    }
}
