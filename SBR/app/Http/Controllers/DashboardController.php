<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\RaceResult;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Estatísticas para o dashboard
        $totalTimes = Time::count();
        $totalCorredores = 0;
        $times = Time::all();
        
        foreach($times as $time) {
            $totalCorredores += count($time->integrantes ?? []);
        }
        
        $totalCorridas = RaceResult::count();
        $totalVitorias = RaceResult::distinct('winner_team_id')->count('winner_team_id');

        return view('dashboard', compact(
            'times',
            'totalTimes', 
            'totalCorredores', 
            'totalCorridas', 
            'totalVitorias'
        ));
    }
}
