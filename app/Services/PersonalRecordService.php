<?php

namespace App\Services;

use App\Repositories\Interfaces\PersonalRecordRepositoryInterface;

class PersonalRecordService
{
    protected $personalRecordRepository;

    public function __construct(PersonalRecordRepositoryInterface $personalRecordRepository)
    {
        $this->personalRecordRepository = $personalRecordRepository;
    }

    public function createPersonalRecord(array $data)
    {
        return $this->personalRecordRepository->create($data);
    }
}
