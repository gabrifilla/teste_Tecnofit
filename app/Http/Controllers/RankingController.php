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
        try {
            $ranking = $this->rankingService->getRanking($movementId);
            if (!$ranking) {
                return response()->json(['message' => 'Movimento não foi encontrado'], 404);
            }
            return response()->json($ranking);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao recuperar ranking: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showRecords(Request $request)
    {
        try {
            $movementId = $request->query('movementId', 1);
            $records = $this->rankingService->getRanking($movementId);
            if (!$records) {
                return redirect()->route('records.index', ['movementId' => 1])
                                 ->with('error', 'Nenhum recorde foi encontrado.');
            }
            return view('records.index', compact('records', 'movementId'));
        } catch (\Exception $e) {
            return redirect()->route('records.index')
                             ->with('error', 'Erro ao buscar recordes: ' . $e->getMessage());
        }
    }
}
