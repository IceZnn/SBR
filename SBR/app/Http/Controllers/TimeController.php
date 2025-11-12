<?php
namespace App\Http\Controllers;

use App\Models\Time;
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
            'integrantes' => 'required|string'
        ]);

        $integrantesArray = array_map('trim', explode(',', $request->integrantes));

        Time::create([
            'nome_time' => $request->nome_time,
            'integrantes' => $integrantesArray
        ]);

        // CORREÇÃO: Mudar para 'times.blade'
        return redirect()->route('times.blade')
            ->with('success', 'Time criado com sucesso!');
    }

    public function show(Time $time)
    {
        return view('times_ver', compact('time'));
    }

    public function edit(Time $time)
    {
        // CORREÇÃO: Mudar para view correta
        return view('times_edit', compact('time'));
    }

    public function update(Request $request, Time $time)
    {
        $request->validate([
            'nome_time' => 'required|string|max:255',
            'integrantes' => 'required|string'
        ]);

        $integrantesArray = array_map('trim', explode(',', $request->integrantes));

        $time->update([
            'nome_time' => $request->nome_time,
            'integrantes' => $integrantesArray
        ]);

        // CORREÇÃO: Mudar para 'times.blade'
        return redirect()->route('times.blade')
            ->with('success', 'Time atualizado com sucesso!');
    }

    public function destroy(Time $time)
    {
        $time->delete();

        // CORREÇÃO: Mudar para 'times.blade'
        return redirect()->route('times.blade')
            ->with('success', 'Time deletado com sucesso!');
    }

    // Adicionar método criarExemplo que estava faltando
    public function criarExemplo()
    {
        $times = [
            [
                'nome_time' => 'Velocistas',
                'integrantes' => ['João', 'Maria', 'Pedro', 'Ana']
            ],
            [
                'nome_time' => 'Corredores', 
                'integrantes' => ['Carlos', 'Julia', 'Lucas']
            ]
        ];

        foreach ($times as $time) {
            Time::create($time);
        }

        return redirect()->route('times.blade')
            ->with('success', 'Dois times de exemplo criados com sucesso!');
    }

    // ... seus métodos existentes ...

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

        // Salva os times selecionados na sessão
        session([
            'corrida_time1' => $time1,
            'corrida_time2' => $time2,
            'corrida_iniciada' => true
        ]);

        return redirect()->route('corrida.blade')
            ->with('success', "Corrida iniciada: {$time1->nome_time} VS {$time2->nome_time}");
    }

    /**
     * Método para a tela de seleção de times (opcional)
     */
    public function selecionarTimes()
    {
        $times = Time::all();
        return view('corrida_selecionar', compact('times'));
    }
}
