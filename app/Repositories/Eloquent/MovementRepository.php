<?php

namespace App\Repositories\Eloquent;

use App\Models\Movement;
use App\Repositories\Interfaces\MovementRepositoryInterface;

class MovementRepository implements MovementRepositoryInterface
{
    public function getAll()
    {
        return Movement::all();
    }

    public function findById($id)
    {
        return Movement::find($id);
    }
}
