<?php

namespace App\Repositories\Interfaces;

interface PersonalRecordRepositoryInterface
{
    public function create(array $data);
    public function getBestRecord($userId, $movementId);
}