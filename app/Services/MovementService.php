<?php

namespace App\Services;

use App\Repositories\Interfaces\MovementRepositoryInterface;

class MovementService
{
    protected $movementRepository;

    public function __construct(MovementRepositoryInterface $movementRepository)
    {
        $this->movementRepository = $movementRepository;
    }

    public function getAllMovements()
    {
        return $this->movementRepository->getAll();
    }
}
