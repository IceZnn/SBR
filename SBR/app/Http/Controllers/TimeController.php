<?php
namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\RaceResult;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::all();
        return view('times', compact('times'));
    }

    public function create()
    {
        return view('times_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_time' => 'required|string|max:255',
            'integrantes' => 'required|string',
            'nome_imagem' => 'required|string|max:255'
        ]);

        $integrantesArray = array_map('trim', explode(',', $request->integrantes));

        Time::create([
            'nome_time' => $request->nome_time,
            'integrantes' => $integrantesArray,
            'nome_imagem' => $request->nome_imagem
        ]);

        return redirect()->route('times.blade')
            ->with('success', 'Time criado com sucesso!');
    }

    public function show(Time $time)
    {
        return view('times_ver', compact('time'));
    }

    public function edit(Time $time)
    {
        return view('times_edit', compact('time'));
    }

    public function update(Request $request, Time $time)
    {
        $request->validate([
            'nome_time' => 'required|string|max:255',
            'integrantes' => 'required|string',
            'nome_imagem' => 'required|string|max:255' // ADICIONADO AQUI
        ]);

        $integrantesArray = array_map('trim', explode(',', $request->integrantes));

        $time->update([
            'nome_time' => $request->nome_time,
            'integrantes' => $integrantesArray,
            'nome_imagem' => $request->nome_imagem // ADICIONADO AQUI
        ]);

        return redirect()->route('times.blade')
            ->with('success', 'Time atualizado com sucesso!');
    }

    public function destroy(Time $time)
    {
        $time->delete();

        return redirect()->route('times.blade')
            ->with('success', 'Time deletado com sucesso!');
    }

    public function criarExemplo()
    {
        $times = [
            [
                'nome_time' => 'Velocistas',
                'integrantes' => ['João', 'Maria', 'Pedro', 'Ana'],
                'nome_imagem' => 'velocistas.png' // ADICIONADO AQUI
            ],
            [
                'nome_time' => 'Corredores', 
                'integrantes' => ['Carlos', 'Julia', 'Lucas'],
                'nome_imagem' => 'corredores.jpg' // ADICIONADO AQUI
            ]
        ];

        foreach ($times as $time) {
            Time::create($time);
        }

        return redirect()->route('times.blade')
            ->with('success', 'Dois times de exemplo criados com sucesso!');
    }

    /**
     * Iniciar corrida com times selecionados
     */
    public function iniciarCorrida(Request $request)
    {
        $request->validate([
            'time1_id' => 'required|exists:times,id',
            'time2_id' => 'required|exists:times,id|different:time1_id'
        ]);

        $time1 = Time::findOrFail($request->time1_id);
        $time2 = Time::findOrFail($request->time2_id);

        session([
            'corrida_time1' => $time1,
            'corrida_time2' => $time2,
            'corrida_iniciada' => true
        ]);

        return redirect()->route('corrida.blade')
            ->with('success', "Corrida iniciada: {$time1->nome_time} VS {$time2->nome_time}");
    }

    /**
     * Método para a tela de seleção de times
     */
    public function selecionarTimes()
    {
        $times = Time::all();
        return view('corrida_selecionar', compact('times'));
    }

    /**
     * MOSTRAR PÁGINA DE RANKING
     */
    public function ranking()
    {
        try {
            if (!\Schema::hasTable('race_results')) {
                return view('ranking', [
                    'totalRaces' => 0,
                    'uniqueWinners' => 0,
                    'avgTime' => '0.00',
                    'lastRaceDate' => 'N/A',
                    'results' => collect()
                ]);
            }

            $results = \App\Models\RaceResult::orderBy('created_at', 'desc')->get();
            
            $totalRaces = $results->count();
            $uniqueWinners = $results->unique('winner_team_name')->count();
            $avgTime = $totalRaces > 0 ? number_format($results->avg('race_time'), 2) : '0.00';
            $lastRaceDate = $totalRaces > 0 ? $results->first()->created_at->format('d/m') : 'N/A';

            return view('ranking', compact(
                'totalRaces', 
                'uniqueWinners', 
                'avgTime', 
                'lastRaceDate',
                'results'
            ));

        } catch (\Exception $e) {
            return view('ranking', [
                'totalRaces' => 0,
                'uniqueWinners' => 0,
                'avgTime' => '0.00',
                'lastRaceDate' => 'N/A',
                'results' => collect()
            ]);
        }
    }

    public function calcularProbabilidadeVitoria($time1, $time2)
    {
        // Fator 1: Número de integrantes
        $fatorIntegrantes1 = count($time1->integrantes) * 10;
        $fatorIntegrantes2 = count($time2->integrantes) * 10;
        
        // Fator 2: Histórico de vitórias (se existir)
        $vitoriasTime1 = RaceResult::where('winner_team_id', $time1->id)->count();
        $vitoriasTime2 = RaceResult::where('winner_team_id', $time2->id)->count();
        $fatorHistorico1 = $vitoriasTime1 * 5;
        $fatorHistorico2 = $vitoriasTime2 * 5;
        
        // Fator 3: Nomes (times com nomes mais "fortes" têm vantagem)
        $nomesFortes = ['veloz', 'rápido', 'lightning', 'thunder', 'venom', 'phantom'];
        $fatorNome1 = 0;
        $fatorNome2 = 0;
        
        foreach ($nomesFortes as $nome) {
            if (stripos($time1->nome_time, $nome) !== false) $fatorNome1 += 15;
            if (stripos($time2->nome_time, $nome) !== false) $fatorNome2 += 15;
        }
        
        // Cálculo final
        $total1 = 50 + $fatorIntegrantes1 + $fatorHistorico1 + $fatorNome1; // Base 50%
        $total2 = 50 + $fatorIntegrantes2 + $fatorHistorico2 + $fatorNome2; // Base 50%
        
        // Normalizar para 100%
        $somaTotal = $total1 + $total2;
        $probabilidade1 = round(($total1 / $somaTotal) * 100);
        $probabilidade2 = 100 - $probabilidade1;
        
        return [
            'time1' => $probabilidade1,
            'time2' => $probabilidade2
        ];
    }

    /**
     * RANKING DE VELOCIDADE - CORRIDAS MAIS RÁPIDAS
     */
    public function rankingVelocidade()
    {
        try {
            if (!\Schema::hasTable('race_results')) {
                return view('ranking_velocidade', [
                    'results' => collect(),
                    'totalRaces' => 0,
                    'fastestTime' => '0.00',
                    'avgTime' => '0.00',
                    'bestTeam' => 'N/A'
                ]);
            }

            // Buscar resultados ordenados por velocidade (menor tempo primeiro)
            $results = RaceResult::with(['winnerTeam', 'loserTeam'])
                ->whereNotNull('race_time')
                ->where('race_time', '>', 0)
                ->orderBy('race_time', 'asc')
                ->get();

            $totalRaces = $results->count();
            $fastestTime = $totalRaces > 0 ? number_format($results->first()->race_time, 2) : '0.00';
            $avgTime = $totalRaces > 0 ? number_format($results->avg('race_time'), 2) : '0.00';
            $bestTeam = $totalRaces > 0 ? $results->first()->winner_team_name : 'N/A';

            return view('ranking_velocidade', compact(
                'results',
                'totalRaces',
                'fastestTime',
                'avgTime',
                'bestTeam'
            ));

        } catch (\Exception $e) {
            return view('ranking_velocidade', [
                'results' => collect(),
                'totalRaces' => 0,
                'fastestTime' => '0.00',
                'avgTime' => '0.00',
                'bestTeam' => 'N/A'
            ]);
        }
    }

    /**
     * SALVAR RESULTADO DA CORRIDA
     */
    public function salvarResultado(Request $request)
    {
        $request->validate([
            'winner_team_id' => 'required|exists:times,id',
            'loser_team_id' => 'required|exists:times,id',
            'winner_runner_name' => 'required|string|max:255',
            'race_time' => 'required|numeric',
            'winner_team_name' => 'required|string|max:255',
            'loser_team_name' => 'required|string|max:255'
        ]);

        RaceResult::create($request->all());

        return response()->json([
            'success' => true, 
            'message' => 'Resultado da corrida salvo com sucesso!'
        ]);
    }

    /**
     * MOSTRAR PÁGINA DE CORRIDA
     */
    public function corrida()
    {
        if (session('corrida_iniciada')) {
            $time1 = session('corrida_time1');
            $time2 = session('corrida_time2');
            
            // CALCULAR PROBABILIDADE
            $probabilidades = $this->calcularProbabilidadeVitoria($time1, $time2);
            
            return view('corrida', compact('time1', 'time2', 'probabilidades'));
        }
        
        // Se não há corrida iniciada, passar probabilidades vazias
        return view('corrida', ['probabilidades' => null]);
    }

    /**
     * MOSTRAR HISTÓRICO DE CORRIDAS
     */
    public function historico()
    {
        if (!\Schema::hasTable('race_results')) {
            return view('corrida_historico', ['results' => collect()]);
        }

        $results = RaceResult::with(['winnerTeam', 'loserTeam'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('corrida_historico', compact('results'));
    }


    public function indexi()
    {
        $times = Time::all();
        
        // Calcular estatísticas
        $totalTimes = Time::count();
        $totalCorredores = 0;
        
        foreach ($times as $time) {
            $totalCorredores += count($time->integrantes ?? []);
        }
        
        $totalCorridas = RaceResult::count();
        $totalVitorias = RaceResult::distinct('winner_team_id')->count('winner_team_id');

        return view('times', compact(
            'times', 
            'totalTimes', 
            'totalCorredores', 
            'totalCorridas', 
            'totalVitorias'
        ));
    }

    // ... outros métodos do controller

}