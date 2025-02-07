<?php

namespace App\Repositories\Interfaces;

interface RankingRepositoryInterface
{
    public function getRankingByMovementId($movementId);
}