<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RANKING</title>
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
            color: #ffd93d;
            text-shadow: 3px 3px 0 #5a2d91, 0 0 15px rgba(255, 217, 61, 0.5);
            margin-bottom: 30px;
            padding: 15px;
            background: rgba(42, 21, 74, 0.7);
            border: 2px solid #ffd93d;
        }

        .stats-header {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(26, 15, 46, 0.7);
            border: 3px solid #8a4fff;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .stat-value {
            color: #4ecdc4;
            font-size: 28px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .stat-label {
            color: #b27bff;
            font-size: 10px;
        }

        .winners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .winner-card {
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 3px solid #8a4fff;
            padding: 20px;
            position: relative;
            transition: all 0.3s ease;
        }

        .winner-card:hover {
            transform: translateY(-5px);
            border-color: #ffd93d;
            box-shadow: 0 10px 25px rgba(255, 217, 61, 0.3);
        }

        .winner-card.gold {
            border-color: #ffd93d;
            background: linear-gradient(135deg, #5a2d91 0%, #7a4da1 100%);
        }

        .winner-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #8a4fff;
        }

        .trophy-icon {
            font-size: 2rem;
            margin-right: 15px;
            filter: drop-shadow(2px 2px 0 #5a2d91);
        }

        .winner-info {
            flex: 1;
        }

        .winner-team {
            color: #ffd93d;
            font-size: 14px;
            margin-bottom: 5px;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .winner-runner {
            color: #4ecdc4;
            font-size: 10px;
        }

        .race-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 15px;
        }

        .detail-item {
            background: rgba(26, 15, 46, 0.5);
            padding: 8px;
            border: 1px solid #8a4fff;
        }

        .detail-label {
            color: #b27bff;
            font-size: 8px;
            margin-bottom: 3px;
        }

        .detail-value {
            color: #fff;
            font-size: 10px;
        }

        .vs-badge {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            color: #1a0f2e;
            padding: 5px 10px;
            font-size: 8px;
            font-weight: bold;
            border: 2px solid #1a0f2e;
            text-align: center;
            margin: 10px 0;
        }

        .date-info {
            text-align: center;
            color: #d4b3ff;
            font-size: 8px;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #8a4fff;
        }

        .podium-section {
            margin: 40px 0;
        }

        .podium-title {
            color: #ffd93d;
            font-size: 18px;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .podium {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            align-items: end;
        }

        .podium-place {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 3px solid #8a4fff;
            position: relative;
        }

        .podium-place.gold {
            border-color: #ffd93d;
            background: linear-gradient(135deg, #ffd93d, #ffdf60);
            color: #5a2d91;
            height: 180px;
        }

        .podium-place.silver {
            border-color: #95a5a6;
            background: linear-gradient(135deg, #95a5a6, #a5b5b6);
            color: #1a0f2e;
            height: 150px;
        }

        .podium-place.bronze {
            border-color: #cd7f32;
            background: linear-gradient(135deg, #cd7f32, #dd8f42);
            color: #1a0f2e;
            height: 130px;
        }
        
        .place-number {
            font-size: 3rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 0 rgba(0,0,0,0.3);
        }

        .place-team {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .place-wins {
            font-size: 8px;
        }

        .controls {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
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

        .btn-gold {
            background: linear-gradient(to bottom, #ffd93d, #e5c935);
            border-bottom: 3px solid #b36b00;
            border-right: 3px solid #b36b00;
            color: #5a2d91;
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

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #d4b3ff;
            background: rgba(26, 15, 46, 0.5);
            border: 2px solid #8a4fff;
        }

        .empty-state div:first-child {
            font-size: 16px;
            color: #b27bff;
            margin-bottom: 15px;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .pixel-title {
                font-size: 18px;
            }
            
            .winners-grid {
                grid-template-columns: 1fr;
            }
            
            .podium {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .podium-place {
                height: 120px !important;
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
            
            .stats-header {
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
        
        <h1 class="pixel-title">🏆 CATÁLOGO DE VENCEDORES 🏆</h1>

        <!-- Estatísticas Gerais -->
        <div class="stats-header">
            <div class="stat-card">
                <div class="stat-value" id="total-races">{{ $results->count() }}</div>
                <div class="stat-label">TOTAL DE CORRIDAS</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="unique-winners">{{ $uniqueWinners }}</div>
                <div class="stat-label">TIMES VENCEDORES</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="avg-time">{{ $avgTime }}</div>
                <div class="stat-label">TEMPO MÉDIO</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="last-race">{{ $lastRaceDate }}</div>
                <div class="stat-label">ÚLTIMA CORRIDA</div>
            </div>
        </div>

        <!-- Pódio dos Melhores Times ABC -->
        @if($topTeams->count() > 0)
        <div class="podium-section">
            <h2 class="podium-title">🎖️ PODIUM DOS MELHORES TIMES 🎖️</h2>
            <div class="podium">
                @foreach($topTeams as $index => $team)
                <div class="podium-place @if($index == 0)gold @elseif($index == 1)silver @else bronze @endif">
                    <div class="place-number">
                        @if($index == 0)🥇
                        @elseif($index == 1)🥈
                        @else 🥉
                        @endif
                    </div>
                    <div class="place-team">{{ $team->winner_team_name }}</div>
                    <div class="place-wins">{{ $team->vitorias }} VITÓRIAS</div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Lista de Vencedores -->
        <h2 style="color: #b27bff; font-size: 16px; text-align: center; margin: 30px 0 20px 0; text-shadow: 2px 2px 0 #5a2d91;">
            📜 HISTÓRICO COMPLETO DE CORRIDAS
        </h2>

        @if($results->count() > 0)
        <div class="winners-grid">
            @foreach($results as $result)
            <div class="winner-card @if($loop->first)gold @endif">
                <div class="winner-header">
                    <div class="trophy-icon">
                        @if($loop->iteration == 1)🏆
                        @elseif($loop->iteration <= 3)🥇
                        @else 🏅
                        @endif
                    </div>
                    <div class="winner-info">
                        <div class="winner-team">{{ $result->winner_team_name }}</div>
                        <div class="winner-runner">Corredor: {{ $result->winner_runner_name }}</div>
                    </div>
                </div>

                <div class="vs-badge">VS</div>

                <div class="race-details">
                    <div class="detail-item">
                        <div class="detail-label">TIME VENCEDOR</div>
                        <div class="detail-value">{{ $result->winner_team_name }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">TIME PERDEDOR</div>
                        <div class="detail-value">{{ $result->loser_team_name }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">TEMPO DA CORRIDA</div>
                        <div class="detail-value">{{ number_format($result->race_time, 2) }}s</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">CORREDOR</div>
                        <div class="detail-value">{{ $result->winner_runner_name }}</div>
                    </div>
                </div>

                <div class="date-info">
                    Corrida realizada em: {{ $result->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <div>🎯 NENHUMA CORRIDA REGISTRADA</div>
            <div>Volte à página de corridas para começar a competir!</div>
        </div>
        @endif

        <!-- Controles -->
        <div class="controls">
            <a href="{{ route('corrida.blade') }}" class="btn-pixel">🏁 VOLTAR ÀS CORRIDAS</a>
            <a href="{{ route('times.blade') }}" class="btn-pixel">👥 VER TIMES</a>
            <a href="{{ route('dashboard') }}" class="btn-pixel">🏠 INÍCIO</a>
            <button onclick="location.reload()" class="btn-pixel btn-gold">🔄 ATUALIZAR</button>
        </div>
    </div>

    <script>
        // Efeitos visuais
        document.addEventListener('DOMContentLoaded', function() {
            const winnerCards = document.querySelectorAll('.winner-card');
            
            winnerCards.forEach((card, index) => {
                // Efeito de entrada escalonada
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.5s ease';
                    
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100 * index);
                }, 100);
            });

            // Efeito de brilho para o pódio
            const podiumPlaces = document.querySelectorAll('.podium-place');
            podiumPlaces.forEach(place => {
                place.addEventListener('mouseenter', function() {
                    this.style.filter = 'brightness(1.2)';
                });
                
                place.addEventListener('mouseleave', function() {
                    this.style.filter = 'brightness(1)';
                });
            });
        });

        // Atualizar a página a cada 30 segundos para novos resultados
        
    </script>
</body>
</html>