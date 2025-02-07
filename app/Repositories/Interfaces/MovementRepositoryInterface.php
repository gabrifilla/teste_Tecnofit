<?php

namespace App\Repositories\Interfaces;

interface MovementRepositoryInterface
{
    public function getAll();
    public function findById($id);
}