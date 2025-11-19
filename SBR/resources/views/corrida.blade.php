<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corrida - Pixel Style</title>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            image-rendering: pixelated;
        }

        body {
            font-family: 'Press Start 2P', cursive, monospace;
            background-color: #1a0f2e;
            color: #fff;
            min-height: 100vh;
            background-image: 
                linear-gradient(135deg, #1a0f2e 0%, #2d1a4a 50%, #1a0f2e 100%),
                repeating-linear-gradient(0deg, transparent, transparent 4px, rgba(80, 20, 120, 0.2) 4px, rgba(80, 20, 120, 0.2) 8px);
            background-attachment: fixed;
            padding: 20px;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 4px solid #8a4fff;
            padding: 30px;
            box-shadow: 
                0 0 0 4px #5a2d91,
                8px 8px 0 #0f0820,
                0 0 20px rgba(138, 79, 255, 0.3);
            position: relative;
        }

        .pixel-title {
            font-size: 24px;
            text-align: center;
            color: #b27bff;
            text-shadow: 3px 3px 0 #5a2d91, 0 0 15px rgba(178, 123, 255, 0.5);
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(42, 21, 74, 0.7);
            border: 2px solid #8a4fff;
        }

        .match-info {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 20px;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(26, 15, 46, 0.7);
            border: 3px solid #8a4fff;
        }

        .team-display {
            text-align: center;
            padding: 15px;
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 2px solid #8a4fff;
        }

        .team-display.team1 {
            border-color: #ff6b6b;
        }

        .team-display.team2 {
            border-color: #4ecdc4;
        }

        .team-name {
            font-size: 14px;
            color: #fff;
            margin-bottom: 10px;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .team-name.team1 { color: #ff6b6b; }
        .team-name.team2 { color: #4ecdc4; }

        .team-members {
            font-size: 9px;
            color: #d4b3ff;
            line-height: 1.4;
        }

        .vs-badge {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            color: #1a0f2e;
            padding: 15px 20px;
            font-size: 16px;
            font-weight: bold;
            border: 3px solid #1a0f2e;
            text-shadow: 1px 1px 0 #fff;
        }

        .turbo-controls {
            background: rgba(26, 15, 46, 0.7);
            border: 3px solid #ff9900;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .turbo-slider {
            width: 100%;
            margin: 10px 0;
            -webkit-appearance: none;
            height: 12px;
            background: linear-gradient(90deg, #4ecdc4, #ff9900, #ff0066);
            border: 2px solid #8a4fff;
            outline: none;
            border-radius: 6px;
        }

        .turbo-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 25px;
            height: 25px;
            background: #ffd93d;
            border: 3px solid #b36b00;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(255, 217, 61, 0.8);
        }

        .turbo-value {
            color: #ffd93d;
            font-size: 12px;
            margin-top: 5px;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .turbo-active {
            animation: turboPulse 0.5s infinite;
        }

        @keyframes turboPulse {
            0%, 100% { box-shadow: 0 0 10px rgba(255, 217, 61, 0.5); }
            50% { box-shadow: 0 0 20px rgba(255, 217, 61, 0.8); }
        }

        .race-track {
            background: linear-gradient(to bottom, #2d1a4a, #1a0f2e);
            border: 4px solid #8a4fff;
            padding: 20px;
            margin-bottom: 30px;
            position: relative;
            min-height: 500px;
            overflow: hidden;
        }

        .track-lane {
            height: 70px;
            margin-bottom: 15px;
            background: rgba(138, 79, 255, 0.1);
            border: 2px solid #8a4fff;
            position: relative;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }

        .track-lane::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: repeating-linear-gradient(
                90deg,
                transparent,
                transparent 10px,
                #8a4fff 10px,
                #8a4fff 20px
            );
            transform: translateY(-50%);
        }

        .runner {
            width: 60px;
            height: 60px;
            position: absolute;
            left: 30px;
            transition: left 0.1s linear;
            z-index: 2;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            image-rendering: auto;
        }

        .runner.team1 {
            border-color: #ff4757;
            background-image: url('alu_Azul.gif');
        }

        .runner.team2 {
            border-color: #2a8c85;
            background-image: url('alucard.gif');
        }

        .runner::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 25px;
            height: 12px;
            clip-path: polygon(0 0, 100% 0, 80% 100%, 20% 100%);
        }

        .runner.team1::after { background: #ff4757; }
        .runner.team2::after { background: #2a8c85; }

        .runner-name {
            position: absolute;
            left: 90px;
            color: #b27bff;
            font-size: 11px;
            text-shadow: 1px 1px 0 #5a2d91;
            background: rgba(26, 15, 46, 0.8);
            padding: 6px 12px;
            border: 1px solid #8a4fff;
            border-radius: 0;
        }

        .runner-name.team1 { border-color: #ff6b6b; }
        .runner-name.team2 { border-color: #4ecdc4; }

        .finish-line {
            position: absolute;
            right: 80px;
            top: 0;
            bottom: 0;
            width: 6px;
            background: repeating-linear-gradient(
                to bottom,
                #ffd93d,
                #ffd93d 10px,
                #ff0066 10px,
                #ff0066 20px
            );
            z-index: 1;
            box-shadow: 0 0 15px rgba(255, 217, 61, 0.7);
        }

        .controls {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .btn-pixel {
            background: linear-gradient(to bottom, #8a4fff, #6a3fd8);
            color: white;
            border: none;
            border-bottom: 3px solid #5a2d91;
            border-right: 3px solid #5a2d91;
            padding: 15px 25px;
            font-family: 'Press Start 2P', cursive;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.1s;
            text-shadow: 1px 1px 0 #5a2d91;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            display: inline-block;
        }

        .btn-pixel:hover {
            background: linear-gradient(to bottom, #9a5fff, #7a4fe8);
            transform: translate(2px, 2px);
            border-bottom-width: 1px;
            border-right-width: 1px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn-success {
            background: linear-gradient(to bottom, #4ecdc4, #3ebdb4);
            border-bottom: 3px solid #2a8c85;
            border-right: 3px solid #2a8c85;
        }

        .btn-warning {
            background: linear-gradient(to bottom, #ff9900, #e58900);
            border-bottom: 3px solid #b36b00;
            border-right: 3px solid #b36b00;
        }

        .btn-danger {
            background: linear-gradient(to bottom, #ff0066, #e5005c);
            border-bottom: 3px solid #b30047;
            border-right: 3px solid #b30047;
        }

        .race-info {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .info-card {
            background: rgba(26, 15, 46, 0.7);
            border: 2px solid #8a4fff;
            padding: 15px;
            text-align: center;
            min-width: 150px;
        }

        .info-value {
            color: #4ecdc4;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .info-label {
            color: #b27bff;
            font-size: 8px;
        }

        .scoreboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .score-card {
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 3px solid #8a4fff;
            padding: 20px;
            position: relative;
        }

        .score-card::before {
            content: "";
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 2px solid #b27bff;
            z-index: -1;
        }

        .score-title {
            color: #b27bff;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .score-list {
            list-style: none;
        }

        .score-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 8px;
            background: rgba(26, 15, 46, 0.5);
            border: 1px solid #8a4fff;
        }

        .position {
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #ffd93d, #ffdf60);
            color: #5a2d91;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            border: 2px solid #5a2d91;
        }

        .position-1 { background: linear-gradient(135deg, #ffd93d, #ffdf60); }
        .position-2 { background: linear-gradient(135deg, #95a5a6, #a5b5b6); }
        .position-3 { background: linear-gradient(135deg, #cd7f32, #dd8f42); }

        .runner-info {
            flex: 1;
            margin-left: 15px;
            font-size: 10px;
        }

        .runner-time {
            color: #4ecdc4;
            font-size: 10px;
        }

        .pixel-decoration {
            position: absolute;
            width: 8px;
            height: 8px;
            background-color: #b27bff;
            box-shadow: 0 0 5px rgba(178, 123, 255, 0.7);
        }

        .pixel-1 { top: -4px; left: -4px; }
        .pixel-2 { top: -4px; right: -4px; }
        .pixel-3 { bottom: -4px; left: -4px; }
        .pixel-4 { bottom: -4px; right: -4px; }

        .scanlines {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to bottom,
                transparent 50%,
                rgba(0, 0, 0, 0.1) 50%
            );
            background-size: 100% 4px;
            pointer-events: none;
            z-index: 1000;
        }

        .status-message {
            background: linear-gradient(135deg, #5a2d91 0%, #6a3da1 100%);
            border: 3px solid #90ee90;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #90ee90;
            text-align: center;
            text-shadow: 1px 1px 0 #006400;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); }
            50% { box-shadow: 0 4px 15px rgba(144, 238, 144, 0.4); }
        }

        @keyframes run {
            0% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
            100% { transform: translateY(0); }
        }

        .running {
            animation: run 0.3s infinite;
        }

        @keyframes celebrate {
            0% { transform: scale(1) rotate(0deg); }
            25% { transform: scale(1.2) rotate(5deg); }
            50% { transform: scale(1.3) rotate(0deg); }
            75% { transform: scale(1.2) rotate(-5deg); }
            100% { transform: scale(1) rotate(0deg); }
        }

        .winner {
            animation: celebrate 0.5s infinite;
        }

        .team-score {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            padding: 15px;
            background: rgba(26, 15, 46, 0.5);
            border: 2px solid #8a4fff;
        }

        .team-points {
            text-align: center;
        }

        .points-value {
            font-size: 24px;
            color: #ffd93d;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .points-label {
            font-size: 10px;
            color: #b27bff;
        }

        .probability-display {
            background: rgba(26, 15, 46, 0.9);
            border: 3px solid #ffd93d;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .pixel-title {
                font-size: 18px;
            }
            
            .match-info {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .vs-badge {
                order: -1;
                margin-bottom: 15px;
            }
            
            .controls {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-pixel {
                width: 100%;
                text-align: center;
            }
            
            .race-track {
                min-height: 400px;
            }
            
            .track-lane {
                height: 60px;
            }
            
            .runner {
                width: 40px;
                height: 40px;
            }
        }
    </style>
    
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
    <div class="scanlines"></div>
    
    <div class="container">
        <div class="pixel-decoration pixel-1"></div>
        <div class="pixel-decoration pixel-2"></div>
        <div class="pixel-decoration pixel-3"></div>
        <div class="pixel-decoration pixel-4"></div>
        
        <h1 class="pixel-title">🏁 CORRIDA PIXELADA 🏁</h1>

        @if(session('corrida_iniciada'))
            <?php
                $time1 = session('corrida_time1');
                $time2 = session('corrida_time2');
                $timeController = new App\Http\Controllers\TimeController();
                $probabilidades = $timeController->calcularProbabilidadeVitoria($time1, $time2);
            ?>
            
            

        @else
            <div class="status-message" style="border-color: #ff9900; color: #ff9900;">
                ⚠️ NENHUM TIME SELECIONADO - <a href="{{ route('corrida.selecionar') }}" style="color: #ffd93d;">SELECIONAR TIMES</a>
            </div>
        @endif

        <div class="turbo-controls">
            <div style="color: #ffd93d; font-size: 10px; margin-bottom: 10px;">⚡ CONTROLE TURBO ⚡</div>
            <input type="range" min="1" max="20" value="5" class="turbo-slider" id="turboSlider" onchange="updateTurbo()">
            <div class="turbo-value" id="turboValue">Velocidade: 5x</div>
        </div>

        @if(session('corrida_iniciada'))
        <div class="match-info">
            <div class="team-display team1">
                <div class="team-name team1">{{ $time1->nome_time }}</div>
                <div class="team-members">
                    <strong>Integrantes:</strong><br>
                    {{ implode(',', $time1->integrantes) }}
                </div>
            </div>
            
            <div class="vs-badge">VS</div>
            
            <div class="team-display team2">
                <div class="team-name team2">{{ $time2->nome_time }}</div>
                <div class="team-members">
                    <strong>Integrantes:</strong><br>
                    {{ implode(',', $time2->integrantes) }}
                </div>
            </div>
        </div>

        <div class="team-score">
            <div class="team-points">
                <div class="points-value" id="team1-points">0</div>
                <div class="points-label">{{ $time1->nome_time }}</div>
            </div>
            <div class="team-points">
                <div class="points-value" id="team2-points">0</div>
                <div class="points-label">{{ $time2->nome_time }}</div>
            </div>
        </div>
        @endif

        <div class="race-info">
            <div class="info-card">
                <div class="info-value" id="race-time">00:00</div>
                <div class="info-label">TEMPO DE CORRIDA</div>
            </div>
            <div class="info-card">
                <div class="info-value" id="runners-count">0</div>
                <div class="info-label">CORREDORES</div>
            </div>
            <div class="info-card">
                <div class="info-value" id="finished-count">0</div>
                <div class="info-label">FINALIZARAM</div>
            </div>
        </div>

        <div class="controls">
            <button class="btn-pixel btn-success" onclick="startRace()">🚀 INICIAR CORRIDA</button>
            <button class="btn-pixel btn-warning" onclick="resetRace()">🔄 REINICIAR</button>
            <a href="{{ route('corrida.selecionar') }}" class="btn-pixel">⚔️ SELECIONAR TIMES</a>
            <a href="{{ route('times.blade') }}" class="btn-pixel">👥 VER TIMES</a>
            <a href="{{ route('ranking.blade') }}" class="btn-pixel btn-gold">🏆 RANKING</a>
        </div>

        <div class="race-track" id="raceTrack">
            <div class="finish-line"></div>
        </div>

        <div class="scoreboard">
            <div class="score-card">
                <h3 class="score-title">🏆 CLASSIFICAÇÃO</h3>
                <ul class="score-list" id="scoreboard"></ul>
            </div>
            
            <div class="score-card">
                <h3 class="score-title">📊 ESTATÍSTICAS</h3>
                <div class="score-list">
                    <div class="score-item">
                        <span>Corrida Mais Rápida:</span>
                        <span id="fastest-time">--:--</span>
                    </div>
                    <div class="score-item">
                        <span>Volta Mais Rápida:</span>
                        <span id="fastest-lap">--:--</span>
                    </div>
                    <div class="score-item">
                        <span>Total de Corridas:</span>
                        <span id="total-races">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        let raceInterval;
        let raceTime = 0;
        let raceStarted = false;
        let runners = [];
        let finishedRunners = [];
        let team1Points = 0;
        let team2Points = 0;
        let turboMultiplier = 1;
        let userAposta = null;

        const time1 = @json(session('corrida_time1', null));
        const time2 = @json(session('corrida_time2', null));

        @if(session('corrida_iniciada'))
            window.team1Probability = {{ $probabilidades['time1'] }};
            window.team2Probability = {{ $probabilidades['time2'] }};
        @else
            window.team1Probability = 50;
            window.team2Probability = 50;
        @endif

        // SISTEMA DE APOSTAS
        function fazerAposta() {
            if (!time1 || !time2) {
                Swal.fire({
                    title: '⚠️ ATENÇÃO',
                    text: 'Selecione os times primeiro!',
                    icon: 'warning',
                    background: '#2d1a4a',
                    color: '#fff'
                });
                return false;
            }

            Swal.fire({
    title: '🎯 FAZER APOSTA',
    html: `<div style="text-align: center; padding: 10px;">
          <p style="color: #ffd93d; font-size: 14px; margin-bottom: 20px; text-shadow: 1px 1px 0 #5a2d91;">EM QUAL TIME VOCÊ APOSTA?</p>
          <div style="display: flex; justify-content: space-around; align-items: center; margin: 25px 0; gap: 15px;">
              <div style="text-align: center; flex: 1;">
                  <div style="background: linear-gradient(135deg, #ff6b6b, #ff4757); padding: 15px; border-radius: 10px; border: 2px solid #ffd93d; margin-bottom: 8px;">
                      <div style="color: white; font-size: 16px; font-weight: bold; margin-bottom: 5px;">${time1.nome_time}</div>
                      <div style="color: #ffd93d; font-size: 12px; font-weight: bold;">${window.team1Probability}% CHANCE</div>
                  </div>
                  <div style="color: #b27bff; font-size: 10px;">Time Vermelho 🔴</div>
              </div>
              
              <div style="color: #ffd93d; font-size: 20px; font-weight: bold; text-shadow: 2px 2px 0 #5a2d91; min-width: 50px;">VS</div>
              
              <div style="text-align: center; flex: 1;">
                  <div style="background: linear-gradient(135deg, #4ecdc4, #2a8c85); padding: 15px; border-radius: 10px; border: 2px solid #ffd93d; margin-bottom: 8px;">
                      <div style="color: white; font-size: 16px; font-weight: bold; margin-bottom: 5px;">${time2.nome_time}</div>
                      <div style="color: #ffd93d; font-size: 12px; font-weight: bold;">${window.team2Probability}% CHANCE</div>
                  </div>
                  <div style="color: #b27bff; font-size: 10px;">Time Verde 🟢</div>
              </div>
          </div>
          <div style="color: #d4b3ff; font-size: 10px; margin-top: 15px; border-top: 1px solid #8a4fff; padding-top: 10px;">
              🎲 Escolha sabiamente!
          </div>
          </div>`,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: `🔴 APOSTAR NO ${time1.nome_time}`,
    cancelButtonText: `🟢 APOSTAR NO ${time2.nome_time}`,
    background: 'linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%)',
    color: '#fff',
    width: '600px',
    customClass: {
        popup: 'sweetalert-popup',
        confirmButton: 'btn-pixel',
        cancelButton: 'btn-pixel',
        title: 'sweetalert-title'
    },
    buttonsStyling: false
}).then((result) => {
    if (result.isConfirmed) {
        userAposta = 'team1';
        Swal.fire({
            title: '✅ APOSTA CONFIRMADA!',
            html: `<div style="text-align: center; padding: 20px;">
                  <div style="font-size: 40px; margin-bottom: 15px;">🔴</div>
                  <p style="color: #b27bff; font-size: 12px; margin-bottom: 10px;">VOCÊ APOSTOU NO:</p>
                  <div style="background: linear-gradient(135deg, #ff6b6b, #ff4757); padding: 20px; border-radius: 12px; border: 3px solid #ffd93d; margin: 15px 0;">
                      <div style="color: white; font-size: 22px; font-weight: bold;">${time1.nome_time}</div>
                      <div style="color: #ffd93d; font-size: 14px; margin-top: 8px;">TIME VERMELHO</div>
                  </div>
                  <div style="color: #ffd93d; font-size: 14px; margin-top: 15px; text-shadow: 1px 1px 0 #5a2d91;">
                      🍀 BOA SORTE! QUE OS JOGOS COMECEM! 🍀
                  </div>
                  </div>`,
            icon: 'success',
            background: 'linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%)',
            color: '#fff',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            customClass: {
                popup: 'sweetalert-popup'
            }
        }).then(() => {
            startRaceAfterAposta();
        });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
        userAposta = 'team2';
        Swal.fire({
            title: '✅ APOSTA CONFIRMADA!',
            html: `<div style="text-align: center; padding: 20px;">
                  <div style="font-size: 40px; margin-bottom: 15px;">🟢</div>
                  <p style="color: #b27bff; font-size: 12px; margin-bottom: 10px;">VOCÊ APOSTOU NO:</p>
                  <div style="background: linear-gradient(135deg, #4ecdc4, #2a8c85); padding: 20px; border-radius: 12px; border: 3px solid #ffd93d; margin: 15px 0;">
                      <div style="color: white; font-size: 22px; font-weight: bold;">${time2.nome_time}</div>
                      <div style="color: #ffd93d; font-size: 14px; margin-top: 8px;">TIME AZUL</div>
                  </div>
                  <div style="color: #ffd93d; font-size: 14px; margin-top: 15px; text-shadow: 1px 1px 0 #5a2d91;">
                      🍀 BOA SORTE! QUE OS JOGOS COMECEM! 🍀
                  </div>
                  </div>`,
            icon: 'success',
            background: 'linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%)',
            color: '#fff',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            customClass: {
                popup: 'sweetalert-popup'
            }
        
                    }).then(() => {
                        startRaceAfterAposta();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    userAposta = 'team2';
                    Swal.fire({
                        title: '✅ APOSTA FEITA!',
                        html: `<div style="text-align: center;">
                              <p>Você apostou no:</p>
                              <div style="color: #4ecdc4; font-size: 20px; font-weight: bold; margin: 10px 0;">${time2.nome_time}</div>
                              <p style="color: #ffd93d;">Boa sorte! 🍀</p>
                              </div>`,
                        icon: 'success',
                        background: '#2d1a4a',
                        color: '#fff',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        startRaceAfterAposta();
                    });
                }
            });
            
            return true;
        }

        function startRaceAfterAposta() {
            if (raceStarted) return;
            
            raceStarted = true;
            raceTime = 0;
            updateRaceTime();
            
            raceInterval = setInterval(() => {
                raceTime += 0.1;
                updateRaceTime();
                moveRunners();
                checkFinishes();
            }, 100);
        }

        function startRace() {
            if (raceStarted) return;
            fazerAposta();
        }

        function getRandomSpeed(baseSpeed, team) {
            let probabilityBonus = 0;
            
            if (team === 'team1') {
                probabilityBonus = (window.team1Probability - 50) * 0.05;
            } else if (team === 'team2') {
                probabilityBonus = (window.team2Probability - 50) * 0.05;
            }
            
            const baseVariation = Math.random() * 2 - 1;
            const luckFactor = Math.random() * 0.8 - 0.4;
            const fatigue = raceTime > 10 ? (raceTime * 0.01) : 0;
            const startBoost = raceTime < 3 ? 1.5 : 1;
            
            return (baseSpeed + baseVariation + luckFactor + probabilityBonus - fatigue) * startBoost * turboMultiplier;
        }

        function updateTurbo() {
            const slider = document.getElementById('turboSlider');
            const turboValue = document.getElementById('turboValue');
            turboMultiplier = slider.value / 5;
            turboValue.textContent = `Velocidade: ${slider.value}x`;
            
            const turboControls = document.querySelector('.turbo-controls');
            if (slider.value > 15) {
                turboControls.classList.add('turbo-active');
            } else {
                turboControls.classList.remove('turbo-active');
            }
        }

        function initRace() {
            const raceTrack = document.getElementById('raceTrack');
            raceTrack.innerHTML = '<div class="finish-line"></div>';
            
            runners = [];
            finishedRunners = [];
            team1Points = 0;
            team2Points = 0;
            raceTime = 0;
            userAposta = null;
            
            document.getElementById('team1-points').textContent = '0';
            document.getElementById('team2-points').textContent = '0';
            document.getElementById('race-time').textContent = '00:00';
            
            if (!time1 || !time2) {
                createDefaultRunners();
            } else {
                createTeamRunners();
            }
            
            updateCounters();
            updateScoreboard();
        }

        function createTeamRunners() {
            const raceTrack = document.getElementById('raceTrack');
            
            time1.integrantes.forEach((integrante, index) => {
                const baseSpeed = 2 + (Math.random() * 3);
                createRunner(integrante, 'team1', index, baseSpeed);
            });
            
            time2.integrantes.forEach((integrante, index) => {
                const baseSpeed = 2 + (Math.random() * 3);
                createRunner(integrante, 'team2', index + time1.integrantes.length, baseSpeed);
            });
        }

        function createDefaultRunners() {
            const defaultRunners = [
                { name: 'João', team: 'team1', speed: 2.5 },
                { name: 'Maria', team: 'team1', speed: 3.8 },
                { name: 'Pedro', team: 'team2', speed: 3.2 },
                { name: 'Ana', team: 'team2', speed: 4.1 }
            ];
            
            defaultRunners.forEach((runner, index) => {
                createRunner(runner.name, runner.team, index, runner.speed);
            });
        }

        function createRunner(name, team, index, customSpeed = null) {
            const raceTrack = document.getElementById('raceTrack');
            const lane = document.createElement('div');
            lane.className = 'track-lane';
            lane.id = `lane-${index}`;
            
            const runnerElement = document.createElement('div');
            runnerElement.className = `runner ${team}`;
            runnerElement.id = `runner-${index}`;
            
            const nameElement = document.createElement('div');
            nameElement.className = `runner-name ${team}`;
            nameElement.textContent = name;
            
            lane.appendChild(runnerElement);
            lane.appendChild(nameElement);
            raceTrack.appendChild(lane);
            
            const speed = customSpeed || (2 + Math.random() * 3);
            
            runners.push({
                name: name,
                team: team,
                baseSpeed: speed,
                speed: speed,
                element: runnerElement,
                position: 30,
                finished: false,
                finishTime: null
            });
            
            runnerElement.style.left = '30px';
        }

        function resetRace() {
            clearInterval(raceInterval);
            raceStarted = false;
            initRace();
        }

        function moveRunners() {
            const raceTrack = document.getElementById('raceTrack');
            const trackWidth = raceTrack.offsetWidth;
            const finishLinePosition = trackWidth - 100;
            
            runners.forEach(runner => {
                if (!runner.finished) {
                    const currentSpeed = getRandomSpeed(runner.baseSpeed, runner.team);
                    runner.position += currentSpeed;
                    
                    if (runner.position >= finishLinePosition) {
                        runner.position = finishLinePosition;
                        if (!runner.finished) {
                            finishRunner(runner);
                        }
                    }
                    
                    runner.element.style.left = runner.position + 'px';
                    
                    if (raceStarted && !runner.finished) {
                        runner.element.classList.add('running');
                    }
                }
            });
        }

        function finishRunner(runner) {
            runner.finished = true;
            runner.finishTime = raceTime;
            runner.element.classList.remove('running');
            runner.element.classList.add('winner');
            
            if (runner.team === 'team1') {
                team1Points++;
                document.getElementById('team1-points').textContent = team1Points;
            } else {
                team2Points++;
                document.getElementById('team2-points').textContent = team2Points;
            }
            
            finishedRunners.push(runner);
            updateCounters();
            updateScoreboard();
            
            if (finishedRunners.length === runners.length) {
                endRace();
            }
        }

        function checkFinishes() {
            const raceTrack = document.getElementById('raceTrack');
            const trackWidth = raceTrack.offsetWidth;
            const finishLinePosition = trackWidth - 100;
            
            runners.forEach(runner => {
                if (!runner.finished && runner.position >= finishLinePosition) {
                    finishRunner(runner);
                }
            });
        }

        function endRace() {
            clearInterval(raceInterval);
            raceStarted = false;
            
            const totalRaces = parseInt(document.getElementById('total-races').textContent) + 1;
            document.getElementById('total-races').textContent = totalRaces;
            
            const winner = finishedRunners.reduce((prev, current) => 
                (prev.finishTime < current.finishTime) ? prev : current
            );
            
            const winningTeam = winner.team;
            
            // VERIFICAR APOSTA
            if (userAposta) {
                const acertou = userAposta === winningTeam;
                const timeApostado = userAposta === 'team1' ? time1.nome_time : time2.nome_time;
                const timeVencedor = winningTeam === 'team1' ? time1.nome_time : time2.nome_time;
                
                setTimeout(() => {
                    if (acertou) {
                        Swal.fire({
                            title: '🎉 PARABÉNS!',
                            html: `<div style="text-align: center;">
                                  <p>Você <strong style="color: #90ee90">ACERTOU</strong> a aposta! 🎯</p>
                                  <p>Apostou no: <strong style="color: #ffd93d">${timeApostado}</strong></p>
                                  <p>Vencedor: <strong style="color: #90ee90">${timeVencedor}</strong></p>
                                  <p style="margin-top: 15px; font-size: 14px; color: #b27bff;">🏆 Ganhou a aposta! 🏆</p>
                                  </div>`,
                            icon: 'success',
                            background: '#2d1a4a',
                            color: '#fff',
                            confirmButtonText: '🎊 COMEMORAR!',
                            customClass: {
                                confirmButton: 'btn-pixel btn-success'
                            }
                        });
                    } else {
                        Swal.fire({
                            title: '💔 QUE PENA!',
                            html: `<div style="text-align: center;">
                                  <p>Você <strong style="color: #ff6b6b">ERROU</strong> a aposta 😔</p>
                                  <p>Apostou no: <strong style="color: #ffd93d">${timeApostado}</strong></p>
                                  <p>Vencedor: <strong style="color: #90ee90">${timeVencedor}</strong></p>
                                  <p style="margin-top: 15px; font-size: 14px; color: #b27bff;">Melhor sorte na próxima! 🍀</p>
                                  </div>`,
                            icon: 'error',
                            background: '#2d1a4a',
                            color: '#fff',
                            confirmButtonText: '🔄 TENTAR NOVAMENTE',
                            customClass: {
                                confirmButton: 'btn-pixel btn-warning'
                            }
                        });
                    }
                }, 1000);
            }

            // Salvar no banco (código anterior)
            const winningTeamId = winningTeam === 'team1' ? {{ $time1->id ?? 'null' }} : {{ $time2->id ?? 'null' }};
            const losingTeamId = winningTeam === 'team1' ? {{ $time2->id ?? 'null' }} : {{ $time1->id ?? 'null' }};
            const winningTeamName = winningTeam === 'team1' ? '{{ $time1->nome_time ?? "TIME 1" }}' : '{{ $time2->nome_time ?? "TIME 2" }}';
            const losingTeamName = winningTeam === 'team1' ? '{{ $time2->nome_time ?? "TIME 2" }}' : '{{ $time1->nome_time ?? "TIME 1" }}';

            if (winningTeamId && losingTeamId) {
                fetch("{{ route('corrida.salvar') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        winner_team_id: winningTeamId,
                        loser_team_id: losingTeamId,
                        winner_runner_name: winner.name,
                        race_time: parseFloat(raceTime.toFixed(2)),
                        winner_team_name: winningTeamName,
                        loser_team_name: losingTeamName
                    })
                });
            }
        }

        function updateRaceTime() {
            document.getElementById('race-time').textContent = formatTime(raceTime);
        }

        function updateCounters() {
            document.getElementById('runners-count').textContent = runners.length;
            document.getElementById('finished-count').textContent = finishedRunners.length;
        }

        function updateScoreboard() {
            const scoreboard = document.getElementById('scoreboard');
            scoreboard.innerHTML = '';
            
            const sortedRunners = [...finishedRunners]
                .sort((a, b) => a.finishTime - b.finishTime)
                .slice(0, 5);
            
            if (sortedRunners.length === 0) {
                const emptyItem = document.createElement('li');
                emptyItem.className = 'score-item';
                emptyItem.innerHTML = '<span style="color: #b27bff; text-align: center; width: 100%;">Aguardando resultados...</span>';
                scoreboard.appendChild(emptyItem);
                return;
            }
            
            sortedRunners.forEach((runner, index) => {
                const item = document.createElement('li');
                item.className = 'score-item';
                
                item.innerHTML = `
                    <div class="position position-${index + 1}">${index + 1}</div>
                    <div class="runner-info">
                        <strong style="color: ${runner.team === 'team1' ? '#ff6b6b' : '#4ecdc4'}">${runner.name}</strong>
                        <div style="color: #d4b3ff; font-size: 8px;">
                            ${runner.team === 'team1' ? (time1 ? time1.nome_time : 'TIME 1') : (time2 ? time2.nome_time : 'TIME 2')} | Vel: ${runner.baseSpeed.toFixed(1)}
                        </div>
                    </div>
                    <div class="runner-time">${formatTime(runner.finishTime)}</div>
                `;
                
                scoreboard.appendChild(item);
            });
        }

        function formatTime(seconds) {
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            const ms = Math.floor((seconds % 1) * 100);
            return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}.${ms.toString().padStart(2, '0')}`;
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            initRace();
            updateTurbo();
        });
    </script>
</body>
</html>