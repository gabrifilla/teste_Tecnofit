<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RankingService;

class RankingController extends Controller
{
    protected $rankingService;

    public function __construct(RankingService $rankingService)
    {
        $this->middleware('auth');
        $this->rankingService = $rankingService;
    }

    public function ranking($movementId)
    {
        $ranking = $this->rankingService->getRanking($movementId);

        if (!$ranking) {
            return response()->json(['message' => 'Movimento não foi encontrado'], 404);
        }

        return response()->json($ranking);
    }

    public function showRecords()
    {
        $movementId = 1;
        $records = $this->rankingService->getRanking($movementId);

        if (!$records) {
            return redirect()->route('records.index')->with('error', 'Nenhum recorde encontrado.');
        }

        return view('records.index', compact('records'));
    }
}
