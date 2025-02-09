<?php

namespace App\Repositories\Eloquent;

use App\Models\PersonalRecord;
use App\Repositories\Interfaces\PersonalRecordRepositoryInterface;

class PersonalRecordRepository implements PersonalRecordRepositoryInterface
{
    public function create(array $data)
    {
        return PersonalRecord::create($data);
    }

    public function getBestRecord($userId, $movementId)
    {
        return PersonalRecord::where('usu_id', $userId)
            ->where('move_id', $movementId)
            ->orderByDesc('value')
            ->first();
    }
}
