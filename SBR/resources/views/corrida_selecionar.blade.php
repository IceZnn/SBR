<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Times - Corrida</title>
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
        }

        .container {
            max-width: 800px;
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
            margin-bottom: 30px;
            padding: 15px;
            background: rgba(42, 21, 74, 0.7);
            border: 2px solid #8a4fff;
        }

        .selection-area {
            margin-bottom: 30px;
        }

        .team-selector {
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 3px solid #8a4fff;
            padding: 25px;
            position: relative;
            margin-bottom: 20px;
        }

        .team-selector::before {
            content: "";
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 2px solid #b27bff;
            z-index: -1;
        }

        .selector-title {
            color: #b27bff;
            font-size: 16px;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 2px 2px 0 #5a2d91;
            padding: 10px;
            background: rgba(26, 15, 46, 0.7);
            border: 1px solid #8a4fff;
        }

        .teams-list {
            max-height: 400px;
            overflow-y: auto;
            border: 2px solid #8a4fff;
            background: rgba(26, 15, 46, 0.5);
            padding: 10px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 10px;
        }

        .team-item {
            background: rgba(138, 79, 255, 0.1);
            border: 2px solid #8a4fff;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .team-item:hover {
            background: rgba(138, 79, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(138, 79, 255, 0.3);
        }

        .team-item.selected {
            background: linear-gradient(135deg, #4ecdc4, #3ebdb4);
            border-color: #2a8c85;
            color: #1a0f2e;
        }

        .team-item.selected .team-name {
            color: #1a0f2e;
            text-shadow: 1px 1px 0 #2a8c85;
        }

        .team-item.selected .team-members {
            color: #1a0f2e;
        }

        .team-name {
            color: #b27bff;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 8px;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .team-members {
            color: #d4b3ff;
            font-size: 8px;
            line-height: 1.4;
        }

        .selection-info {
            text-align: center;
            color: #ffd93d;
            font-size: 10px;
            margin: 15px 0;
            padding: 10px;
            background: rgba(255, 217, 61, 0.1);
            border: 1px solid #ffd93d;
        }

        .selected-teams {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 20px;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(26, 15, 46, 0.7);
            border: 3px solid #8a4fff;
        }

        .selected-team {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 2px solid #8a4fff;
            min-height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .selected-team.team1 {
            border-color: #ff6b6b;
        }

        .selected-team.team2 {
            border-color: #4ecdc4;
        }

        .selected-team.empty {
            background: rgba(26, 15, 46, 0.3);
            border: 2px dashed #8a4fff;
            color: #8a4fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
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

        .team-badge {
            font-size: 14px;
            color: #b27bff;
            margin-bottom: 10px;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .team-badge.team1 { color: #ff6b6b; }
        .team-badge.team2 { color: #4ecdc4; }

        .selected-team-name {
            font-size: 16px;
            color: #fff;
            margin-bottom: 10px;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .selected-team-members {
            font-size: 9px;
            color: #d4b3ff;
            line-height: 1.4;
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
            margin: 5px;
        }

        .btn-pixel:hover {
            background: linear-gradient(to bottom, #9a5fff, #7a4fe8);
            transform: translate(2px, 2px);
            border-bottom-width: 1px;
            border-right-width: 1px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn-pixel:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .btn-success {
            background: linear-gradient(to bottom, #4ecdc4, #3ebdb4);
            border-bottom: 3px solid #2a8c85;
            border-right: 3px solid #2a8c85;
        }

        .btn-success:hover:not(:disabled) {
            background: linear-gradient(to bottom, #5eddd4, #4ecdc4);
        }

        .btn-danger {
            background: linear-gradient(to bottom, #ff0066, #e5005c);
            border-bottom: 3px solid #b30047;
            border-right: 3px solid #b30047;
        }

        .btn-danger:hover {
            background: linear-gradient(to bottom, #ff3388, #ff0066);
        }

        .controls {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
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

        .empty-message {
            text-align: center;
            color: #8a4fff;
            font-size: 10px;
            padding: 40px 20px;
            grid-column: 1 / -1;
        }

        .clear-selection {
            background: linear-gradient(to bottom, #ff9900, #e58900);
            border-bottom: 3px solid #b36b00;
            border-right: 3px solid #b36b00;
            padding: 8px 15px;
            font-size: 8px;
            margin-top: 10px;
        }

        .clear-selection:hover {
            background: linear-gradient(to bottom, #ffaa33, #ff9900);
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .selected-teams {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .vs-badge {
                order: -1;
                margin-bottom: 15px;
            }
            
            .container {
                padding: 20px;
            }
            
            .pixel-title {
                font-size: 18px;
            }
            
            .teams-list {
                grid-template-columns: 1fr;
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
            
            .controls {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-pixel {
                width: 100%;
                text-align: center;
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
        
        <h1 class="pixel-title">⚔️ SELECIONAR 2 TIMES ⚔️</h1>

        <div class="selection-info">
            🎯 SELECIONE 2 TIMES PARA A CORRIDA - CLIQUE NOS TIMES PARA SELECIONAR/DESSELECIONAR
        </div>

        <div class="selection-area">
            <div class="team-selector">
                <div class="selector-title">📋 TODOS OS TIMES DISPONÍVEIS</div>
                <div class="teams-list" id="teamsList">
                    @forelse($times as $times)
                    <div class="team-item" data-time-id="{{ $times->id }}">
                        <div class="team-name">{{ $times->nome_time }}</div>
                        <div class="team-members">
                            <strong>Integrantes:</strong> {{ implode(', ', $times->integrantes) }}<br>
                            <strong>Total:</strong> {{ count($times->integrantes) }} corredores
                        </div>
                    </div>
                    @empty
                    <div class="empty-message">
                        🚫 NENHUM TIME CADASTRADO<br>
                        <a href="{{ route('times_create.blade') }}" style="color: #ffd93d;">CRIAR PRIMEIRO TIME</a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Times Selecionados -->
        <div class="selected-teams">
            <div class="selected-team team1" id="selectedTeam1">
                <div class="empty-message">🟥 Time 1 não selecionado</div>
            </div>
            
            <div class="vs-badge pulse">VS</div>
            
            <div class="selected-team team2" id="selectedTeam2">
                <div class="empty-message">🟦 Time 2 não selecionado</div>
            </div>
        </div>

        <div class="controls">
            <form action="{{ route('corrida.iniciar') }}" method="POST" id="raceForm">
                @csrf
                <input type="hidden" name="time1_id" id="time1Id">
                <input type="hidden" name="time2_id" id="time2Id">
                <button type="submit" class="btn-pixel btn-success" id="startRaceBtn" disabled>
                    🏁 INICIAR CORRIDA
                </button>
            </form>
            <button class="btn-pixel btn-danger" onclick="clearSelection()">
                🗑️ LIMPAR SELEÇÃO
            </button>
            <a href="{{ route('times.blade') }}" class="btn-pixel">
                🏠 VOLTAR AOS TIMES
            </a>
            
        </div>
    </div>

    <script>
        let selectedTeam1 = null;
        let selectedTeam2 = null;

        function selectTeam(teamElement) {
            const timeId = teamElement.getAttribute('data-time-id');
            const timeName = teamElement.querySelector('.team-name').textContent;
            const timeMembers = teamElement.querySelector('.team-members').textContent;

            const timeData = {
                id: timeId,
                name: timeName,
                members: timeMembers
            };

            if (!selectedTeam1) {
                // Selecionar como Time 1
                selectedTeam1 = timeData;
                updateSelectedTeamDisplay('selectedTeam1', timeData, '🟥 TIME 1');
                teamElement.classList.add('selected');
            } else if (!selectedTeam2 && selectedTeam1.id !== timeId) {
                // Selecionar como Time 2
                selectedTeam2 = timeData;
                updateSelectedTeamDisplay('selectedTeam2', timeData, '🟦 TIME 2');
                teamElement.classList.add('selected');
            } else if (selectedTeam1 && selectedTeam1.id === timeId) {
                // Desselecionar Time 1
                selectedTeam1 = null;
                document.getElementById('selectedTeam1').innerHTML = '<div class="empty-message">🟥 Time 1 não selecionado</div>';
                document.getElementById('selectedTeam1').classList.add('empty');
                teamElement.classList.remove('selected');
            } else if (selectedTeam2 && selectedTeam2.id === timeId) {
                // Desselecionar Time 2
                selectedTeam2 = null;
                document.getElementById('selectedTeam2').innerHTML = '<div class="empty-message">🟦 Time 2 não selecionado</div>';
                document.getElementById('selectedTeam2').classList.add('empty');
                teamElement.classList.remove('selected');
            }
            
            updateStartButton();
            updateFormInputs();
        }

        function updateSelectedTeamDisplay(containerId, team, badgeText) {
            const container = document.getElementById(containerId);
            container.innerHTML = `
                <div class="team-badge ${containerId === 'selectedTeam1' ? 'team1' : 'team2'}">${badgeText}</div>
                <div class="selected-team-name">${team.name}</div>
                <div class="selected-team-members">${team.members}</div>
                <button type="button" class="btn-pixel clear-selection" onclick="deselectTeam('${containerId}')">
                    ❌ REMOVER
                </button>
            `;
            container.classList.remove('empty');
        }

        function deselectTeam(teamSlot) {
            const teamId = teamSlot === 'selectedTeam1' ? selectedTeam1?.id : selectedTeam2?.id;
            
            if (teamSlot === 'selectedTeam1') {
                selectedTeam1 = null;
                document.getElementById('selectedTeam1').innerHTML = '<div class="empty-message">🟥 Time 1 não selecionado</div>';
                document.getElementById('selectedTeam1').classList.add('empty');
            } else {
                selectedTeam2 = null;
                document.getElementById('selectedTeam2').innerHTML = '<div class="empty-message">🟦 Time 2 não selecionado</div>';
                document.getElementById('selectedTeam2').classList.add('empty');
            }
            
            // Remover classe selected do elemento na lista
            if (teamId) {
                const teamElement = document.querySelector(`[data-time-id="${teamId}"]`);
                if (teamElement) {
                    teamElement.classList.remove('selected');
                }
            }
            
            updateStartButton();
            updateFormInputs();
        }

        function clearSelection() {
            // Remover seleção de todos os times
            document.querySelectorAll('.team-item.selected').forEach(item => {
                item.classList.remove('selected');
            });
            
            selectedTeam1 = null;
            selectedTeam2 = null;
            
            document.getElementById('selectedTeam1').innerHTML = '<div class="empty-message">🟥 Time 1 não selecionado</div>';
            document.getElementById('selectedTeam1').classList.add('empty');
            
            document.getElementById('selectedTeam2').innerHTML = '<div class="empty-message">🟦 Time 2 não selecionado</div>';
            document.getElementById('selectedTeam2').classList.add('empty');
            
            updateStartButton();
            updateFormInputs();
        }

        function updateStartButton() {
            const startBtn = document.getElementById('startRaceBtn');
            if (selectedTeam1 && selectedTeam2) {
                startBtn.disabled = false;
                startBtn.innerHTML = `🏁 CORRER: ${selectedTeam1.name} VS ${selectedTeam2.name}`;
            } else {
                startBtn.disabled = true;
                startBtn.innerHTML = '🏁 INICIAR CORRIDA';
            }
        }

        function updateFormInputs() {
            document.getElementById('time1Id').value = selectedTeam1 ? selectedTeam1.id : '';
            document.getElementById('time2Id').value = selectedTeam2 ? selectedTeam2.id : '';
        }

        // Configurar eventos quando a página carregar
        document.addEventListener('DOMContentLoaded', function() {
            // Adicionar evento de clique em todos os times
            document.querySelectorAll('.team-item').forEach(item => {
                item.addEventListener('click', function() {
                    selectTeam(this);
                });
            });

            // Efeitos visuais
            const teamItems = document.querySelectorAll('.team-item');
            teamItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('selected')) {
                        this.style.transform = 'translateY(-3px) scale(1.02)';
                    }
                });
                
                item.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('selected')) {
                        this.style.transform = 'translateY(0) scale(1)';
                    }
                });
            });

            // Prevenir submit do form se não tiver times selecionados
            document.getElementById('raceForm').addEventListener('submit', function(e) {
                if (!selectedTeam1 || !selectedTeam2) {
                    e.preventDefault();
                    alert('Selecione 2 times para iniciar a corrida!');
                }
            });
        });
    </script>
</body>
</html>