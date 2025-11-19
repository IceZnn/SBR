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

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #d4b3ff;
            background: rgba(26, 15, 46, 0.5);
            border: 2px solid #8a4fff;
            margin: 20px 0;
        }

        .empty-state div:first-child {
            font-size: 16px;
            color: #b27bff;
            margin-bottom: 15px;
            text-shadow: 1px 1px 0 #5a2d91;
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

        /* Mensagem de construção */
        .construction-message {
            text-align: center;
            padding: 40px;
            background: linear-gradient(135deg, #5a2d91 0%, #6a3da1 100%);
            border: 3px solid #ffd93d;
            margin: 30px 0;
        }

        .construction-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            filter: drop-shadow(2px 2px 0 #5a2d91);
        }

        .construction-text {
            color: #ffd93d;
            font-size: 14px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .construction-subtext {
            color: #d4b3ff;
            font-size: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .pixel-title {
                font-size: 18px;
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
        
        <h1 class="pixel-title">🏆 RANKING OFICIAL 🏆</h1>

        <!-- Estatísticas Gerais -->
        <div class="stats-header">
            <div class="stat-card">
                <div class="stat-value">{{ $totalRaces }}</div>
                <div class="stat-label">TOTAL DE CORRIDAS</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $uniqueWinners }}</div>
                <div class="stat-label">TIMES VENCEDORES</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $avgTime }}</div>
                <div class="stat-label">TEMPO MÉDIO</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $lastRaceDate }}</div>
                <div class="stat-label">ÚLTIMA CORRIDA</div>
            </div>
        </div>

        <!-- Mensagem de Construção -->
        

        <!-- Mensagem quando não há corridas -->
       <!-- Lista de Corridas Realizadas -->
        <!-- Lista de Corridas Realizadas -->
    @if($totalRaces > 0)
    <div style="margin: 40px 0;">
        <h2 style="color: #ffd93d; font-size: 18px; text-align: center; margin-bottom: 30px; text-shadow: 2px 2px 0 #5a2d91; padding: 10px; border-bottom: 2px solid #ffd93d;">
            
        </h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 20px;">
            @foreach($results as $index => $result)
            <div style="
                background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%); 
                border: 3px solid #8a4fff; 
                padding: 20px; 
                border-radius: 8px;
                box-shadow: 0 6px 12px rgba(0,0,0,0.3);
                transition: all 0.3s ease;
            " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(255,217,61,0.3)'" 
            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 12px rgba(0,0,0,0.3)'">
                
                <!-- Cabeçalho do Card -->
                <div style="display: flex; align-items: center; margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #8a4fff;">
                    <div style="flex: 1;">
                        <div style="color: #ffd93d; font-size: 14px; font-weight: bold; margin-bottom: 5px; text-shadow: 1px 1px 0 #5a2d91;">
                            {{ $result->winner_team_name }}
                        </div>
                        <div style="color: #4ecdc4; font-size: 10px;">
                            🏃 {{ $result->winner_runner_name }}
                        </div>
                    </div>
                </div>

                <!-- Detalhes da Corrida -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 15px;">
                    <div style="background: rgba(26, 15, 46, 0.5); padding: 8px; border: 1px solid #8a4fff; text-align: center;">
                        <div style="color: #b27bff; font-size: 8px; margin-bottom: 3px;">⏱️ TEMPO</div>
                        <div style="color: #4ecdc4; font-size: 12px; font-weight: bold;">{{ number_format($result->race_time, 2) }}s</div>
                    </div>
                    <div style="background: rgba(26, 15, 46, 0.5); padding: 8px; border: 1px solid #8a4fff; text-align: center;">
                        <div style="color: #b27bff; font-size: 8px; margin-bottom: 3px;">📅 DATA</div>
                        <div style="color: #d4b3ff; font-size: 9px;">{{ $result->created_at->format('d/m/Y') }}</div>
                    </div>
                </div>

                <!-- VS Badge -->
                <div style="
                    background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
                    color: #1a0f2e;
                    padding: 6px 12px;
                    font-size: 10px;
                    font-weight: bold;
                    border: 2px solid #1a0f2e;
                    text-align: center;
                    margin: 10px 0;
                    border-radius: 4px;
                    text-shadow: 1px 1px 0 rgba(255,255,255,0.5);
                ">
                    VS
                </div>

                <!-- Time Perdedor -->
                <div style="text-align: center; color: #ff6b6b; font-size: 11px; font-weight: bold; padding: 8px; background: rgba(255,107,107,0.1); border-radius: 4px;">
                    {{ $result->loser_team_name }}
                </div>

                <!-- Rodapé -->
                <div style="text-align: center; color: #d4b3ff; font-size: 8px; margin-top: 15px; padding-top: 10px; border-top: 1px solid #8a4fff;">
                    🕒 {{ $result->created_at->format('H:i') }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endif

        <!-- Controles -->
        <div class="controls">
            <a href="{{ route('corrida.selecionar') }}" class="btn-pixel">🏁 INICIAR CORRIDA</a>
            <a href="{{ route('times.blade') }}" class="btn-pixel">👥 GERENCIAR TIMES</a>
            <a href="{{ route('dashboard') }}" class="btn-pixel">🏠 VOLTAR AO INÍCIO</a>
        </div>
    </div>

    <script>
        // Efeitos visuais básicos
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-pixel');
            
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translate(2px, 2px)';
                });
                
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translate(0, 0)';
                });
            });

            // Efeito de pulso na mensagem de construção
            const construction = document.querySelector('.construction-message');
            setInterval(() => {
                construction.style.borderColor = construction.style.borderColor === '#ffd93d' ? '#4ecdc4' : '#ffd93d';
            }, 1000);
        });
    </script>
</body>
</html>