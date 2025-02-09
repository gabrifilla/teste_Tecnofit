<?php

namespace App\Services;

use App\Repositories\Interfaces\RankingRepositoryInterface;
use App\Repositories\Interfaces\MovementRepositoryInterface;

class RankingService
{
    protected $rankingRepository;
    protected $movementRepository;

    public function __construct(RankingRepositoryInterface $rankingRepository, MovementRepositoryInterface $movementRepository)
    {
        $this->rankingRepository = $rankingRepository;
        $this->movementRepository = $movementRepository;
    }

    public function getRanking($movementId)
    {
        $movement = $this->movementRepository->findById($movementId);
        if (!$movement) {
            return null;
        }

        $ranking = $this->rankingRepository->getRankingByMovementId($movementId);

        return [
            'movement' => $movement->name,
            'ranking' => !empty($ranking) ? $ranking : "Não possui ninguém no ranking ainda."
        ];
    }
}
