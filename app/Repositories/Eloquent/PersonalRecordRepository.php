<?php

namespace App\Repositories\Eloquent;

use App\Models\RecordPessoal;
use App\Repositories\Interfaces\PersonalRecordRepositoryInterface;

class PersonalRecordRepository implements PersonalRecordRepositoryInterface
{
    public function create(array $data)
    {
        return RecordPessoal::create($data);
    }

    public function getBestRecord($userId, $movementId)
    {
        return RecordPessoal::where('usuario_id', $userId)
            ->where('movimento_id', $movementId)
            ->orderByDesc('valor')
            ->first();
    }
}
