<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times de Corrida</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border: 4px solid #000;
            border-radius: 0;
            padding: 20px;
            box-shadow: 8px 8px 0 #000;
        }

        .pixel-title {
            font-size: 2.5em;
            text-align: center;
            color: #ff6b6b;
            text-shadow: 3px 3px 0 #000;
            margin-bottom: 30px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .time-card {
            background: #fff;
            border: 3px solid #000;
            border-radius: 0;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 4px 4px 0 #000;
        }

        .time-nome {
            font-size: 1.5em;
            color: #4ecdc4;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 1px 1px 0 #000;
        }

        .btn-pixel {
            background: #ffd93d;
            border: 3px solid #000;
            border-radius: 0;
            padding: 10px 20px;
            font-family: 'Courier New', monospace;
            font-weight: bold;
            font-size: 1.1em;
            cursor: pointer;
            box-shadow: 4px 4px 0 #000;
            transition: all 0.2s;
            margin: 5px;
            text-decoration: none;
            color: #000;
            display: inline-block;
        }

        .btn-pixel:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="pixel-title">🏁 TIMES DE CORRIDA 🏁</h1>

        @if(session('success'))
            <div style="background: #4ecdc4; padding: 15px; margin-bottom: 20px; border: 3px solid #000;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('times_create.blade') }}" class="btn-pixel">➕ NOVO TIME</a>

        <div style="margin-top: 30px;">
            @foreach($times as $time)
            <div class="time-card">
                <div class="time-nome">{{ $time->nome_time }}</div>
                <div><strong>Integrantes:</strong> {{ implode(', ', $time->integrantes) }}</div>
                <div><strong>Total:</strong> {{ $time->numero_integrantes }} corredores</div>
                <a href="{{ route('times_ver.blade', $time) }}" class="btn-pixel" style="background: #4ecdc4; margin-top: 10px;">VER DETALHES</a>
            </div>
            @endforeach

            @if($times->isEmpty())
            <div class="time-card" style="text-align: center;">
                <div style="font-size: 1.2em; color: #666;">🎯 NENHUM TIME CADASTRADO</div>
                <div style="margin-top: 10px;">Clique nos botões acima para criar times!</div>
            </div>
            @endif
        </div>
    </div>
</body>
</html>