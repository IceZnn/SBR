<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corrida - Pixel Style</title>
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
            width: 50px;
            height: 50px;
            position: absolute;
            left: 30px;
            transition: left 0.1s linear;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .runner.team1 {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            border: 3px solid #ff4757;
            text-shadow: 2px 2px 0 #ff4757;
        }

        .runner.team2 {
            background: linear-gradient(135deg, #4ecdc4, #6eddd4);
            border: 3px solid #2a8c85;
            text-shadow: 2px 2px 0 #2a8c85;
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
            right: 100px;
            top: 0;
            bottom: 0;
            width: 4px;
            background: repeating-linear-gradient(
                to bottom,
                #ffd93d,
                #ffd93d 10px,
                transparent 10px,
                transparent 20px
            );
            z-index: 1;
        }

        .finish-line::after {
            content: "🏁";
            position: absolute;
            right: -25px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            filter: drop-shadow(2px 2px 0 #5a2d91);
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

        .btn-success:hover {
            background: linear-gradient(to bottom, #5eddd4, #4ecdc4);
        }

        .btn-warning {
            background: linear-gradient(to bottom, #ff9900, #e58900);
            border-bottom: 3px solid #b36b00;
            border-right: 3px solid #b36b00;
        }

        .btn-warning:hover {
            background: linear-gradient(to bottom, #ffaa33, #ff9900);
        }

        .btn-danger {
            background: linear-gradient(to bottom, #ff0066, #e5005c);
            border-bottom: 3px solid #b30047;
            border-right: 3px solid #b30047;
        }

        .btn-danger:hover {
            background: linear-gradient(to bottom, #ff3388, #ff0066);
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

        /* Responsive */
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
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .container {
                padding: 15px;
            }
            
            .pixel-title {
                font-size: 16px;
                padding: 10px;
            }
            
            .btn-pixel {
                padding: 12px 20px;
                font-size: 10px;
            }
            
            .scoreboard {
                grid-template-columns: 1fr;
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

        <!-- Mensagem de times selecionados -->
        @if(session('corrida_iniciada'))
            <?php
                $time1 = session('corrida_time1');
                $time2 = session('corrida_time2');
            ?>
            <div class="status-message">
                🏁 CORRIDA: <strong>{{ $time1->nome_time }}</strong> VS <strong>{{ $time2->nome_time }}</strong>
            </div>
        @else
            <div class="status-message" style="border-color: #ff9900; color: #ff9900;">
                ⚠️ NENHUM TIME SELECIONADO - <a href="{{ route('corrida.selecionar') }}" style="color: #ffd93d;">SELECIONAR TIMES</a>
            </div>
        @endif

        <!-- Informações da Partida -->
        @if(session('corrida_iniciada'))
        <div class="match-info">
            <div class="team-display team1">
                <div class="team-name team1">{{ $time1->nome_time }}</div>
                <div class="team-members">
                    <strong>Integrantes:</strong><br>
                    {{ implode('<br>', $time1->integrantes) }}
                </div>
            </div>
            
            <div class="vs-badge">VS</div>
            
            <div class="team-display team2">
                <div class="team-name team2">{{ $time2->nome_time }}</div>
                <div class="team-members">
                    <strong>Integrantes:</strong><br>
                    {{ implode('<br>', $time2->integrantes) }}
                </div>
            </div>
        </div>

        <!-- Placar dos Times -->
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
            <a href="{{ route('times.blade') }}" class="btn-pixel">🏠 VOLTAR AOS TIMES</a>
        </div>

        <div class="race-track" id="raceTrack">
            <div class="finish-line"></div>
            <!-- As pistas serão geradas dinamicamente pelo JavaScript -->
        </div>

        <div class="scoreboard">
            <div class="score-card">
                <h3 class="score-title">🏆 CLASSIFICAÇÃO</h3>
                <ul class="score-list" id="scoreboard">
                    <!-- Resultados serão gerados aqui -->
                </ul>
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

    <script>
        let raceInterval;
        let raceTime = 0;
        let raceStarted = false;
        let runners = [];
        let finishedRunners = [];
        let team1Points = 0;
        let team2Points = 0;

        // Dados dos times da sessão
        const time1 = @json(session('corrida_time1', null));
        const time2 = @json(session('corrida_time2', null));

        function initRace() {
            const raceTrack = document.getElementById('raceTrack');
            raceTrack.innerHTML = '<div class="finish-line"></div>';
            
            runners = [];
            finishedRunners = [];
            team1Points = 0;
            team2Points = 0;
            
            document.getElementById('team1-points').textContent = '0';
            document.getElementById('team2-points').textContent = '0';
            
            // Se não há times selecionados, usar corredores padrão
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
            
            // Time 1
            time1.integrantes.forEach((integrante, index) => {
                createRunner(integrante, 'team1', index);
            });
            
            // Time 2
            time2.integrantes.forEach((integrante, index) => {
                createRunner(integrante, 'team2', index + time1.integrantes.length);
            });
        }

        function createDefaultRunners() {
            const defaultRunners = [
                { name: 'João', team: 'team1', speed: 3 },
                { name: 'Maria', team: 'team1', speed: 4 },
                { name: 'Pedro', team: 'team2', speed: 2 },
                { name: 'Ana', team: 'team2', speed: 5 }
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
            runnerElement.innerHTML = '🏃';
            runnerElement.id = `runner-${index}`;
            
            const nameElement = document.createElement('div');
            nameElement.className = `runner-name ${team}`;
            nameElement.textContent = name;
            
            lane.appendChild(runnerElement);
            lane.appendChild(nameElement);
            raceTrack.appendChild(lane);
            
            const speed = customSpeed || (Math.floor(Math.random() * 3) + 2);
            
            runners.push({
                name: name,
                team: team,
                speed: speed,
                element: runnerElement,
                position: 30,
                finished: false,
                finishTime: null
            });
            
            runnerElement.style.left = '30px';
        }

        function startRace() {
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

        function resetRace() {
            clearInterval(raceInterval);
            raceStarted = false;
            raceTime = 0;
            updateRaceTime();
            initRace();
        }

        function moveRunners() {
            runners.forEach(runner => {
                if (!runner.finished) {
                    const randomSpeed = runner.speed + (Math.random() - 0.5);
                    runner.position += randomSpeed;
                    
                    if (runner.position > window.innerWidth - 200) {
                        runner.position = window.innerWidth - 200;
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
            runner.element.innerHTML = '🎉';
            
            // Adiciona pontos ao time
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
            runners.forEach(runner => {
                if (!runner.finished && runner.position >= window.innerWidth - 200) {
                    finishRunner(runner);
                }
            });
        }

        function endRace() {
            clearInterval(raceInterval);
            raceStarted = false;
            
            const totalRaces = parseInt(document.getElementById('total-races').textContent) + 1;
            document.getElementById('total-races').textContent = totalRaces;
            
            if (finishedRunners.length > 0) {
                const fastest = finishedRunners.reduce((prev, current) => 
                    (prev.finishTime < current.finishTime) ? prev : current
                );
                document.getElementById('fastest-time').textContent = formatTime(fastest.finishTime);
            }
            
            // Mostrar vencedor da corrida
            let winnerMessage = '🏁 CORRIDA FINALIZADA! ';
            if (team1Points > team2Points) {
                winnerMessage += `VENCEDOR: ${time1 ? time1.nome_time : 'TIME 1'} 🏆`;
            } else if (team2Points > team1Points) {
                winnerMessage += `VENCEDOR: ${time2 ? time2.nome_time : 'TIME 2'} 🏆`;
            } else {
                winnerMessage += 'EMPATE! 🤝';
            }
            
            setTimeout(() => {
                alert(winnerMessage);
            }, 500);
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
                            ${runner.team === 'team1' ? (time1 ? time1.nome_time : 'TIME 1') : (time2 ? time2.nome_time : 'TIME 2')} | Vel: ${runner.speed.toFixed(1)}
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
            return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        }

        // Inicializa a corrida quando a página carrega
        document.addEventListener('DOMContentLoaded', function() {
            initRace();
        });
    </script>
</body>
</html>