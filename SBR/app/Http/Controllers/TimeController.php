<?php
// app/Http/Controllers/TimeController.php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the times.
     */
    public function index()
    {
        $times = Time::all();
        return view('times', compact('times'));
    }

    /**
     * Show the form for creating a new time.
     */
    public function create()
    {
        return view('times_create');
    }

    /**
     * Store a newly created time in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_time' => 'required|string|max:255',
            'integrantes' => 'required|string'
        ]);

        // Converte a string de integrantes para array
        $integrantesArray = array_map('trim', explode(',', $request->integrantes));

        Time::create([
            'nome_time' => $request->nome_time,
            'integrantes' => $integrantesArray
        ]);

        return redirect()->route('times.blade')
            ->with('success', 'Time criado com sucesso!');
    }

    /**
     * Método para criar dois times de exemplo
     *

    /**
     * Display the specified time.
     */
    public function show(Time $time)
    {
        return view('times_ver', compact('time'));
    }
}
