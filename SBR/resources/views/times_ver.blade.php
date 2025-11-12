<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $time->nome_time }} - Sistema de Corrida</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #1a1a1a;
            background-image: 
                linear-gradient(45deg, #111 25%, transparent 25%),
                linear-gradient(-45deg, #111 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, #111 75%),
                linear-gradient(-45deg, transparent 75%, #111 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
            font-family: 'Press Start 2P', monospace;
            min-height: 100vh;
            padding: 20px;
            color: #00ffcc;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .pixel-box {
            background-color: #2b2b2b;
            border: 4px solid #00ffcc;
            padding: 2rem;
            box-shadow: 
                0 0 15px #00ffcc,
                inset 0 0 10px rgba(0, 255, 204, 0.1);
            image-rendering: pixelated;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .pixel-box::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 2px solid #ff00ff;
            z-index: -1;
        }

        .pixel-title {
            color: #00ffcc;
            text-shadow: 0 0 10px #00ffcc;
            font-size: 16px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .pixel-subtitle {
            color: #ff00ff;
            font-size: 12px;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .btn-pixel {
            font-family: 'Press Start 2P', monospace;
            image-rendering: pixelated;
            background-color: #00ffcc;
            border: 3px solid #111;
            color: #111;
            padding: 12px 24px;
            font-size: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-pixel:hover {
            background-color: #ff00ff;
            color: white;
            box-shadow: 0 0 15px #ff00ff;
            transform: translateY(-2px);
            text-decoration: none;
        }

        .btn-secondary {
            background-color: #666;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #888;
            box-shadow: 0 0 15px #888;
        }

        .team-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-card {
            background-color: #1a1a1a;
            border: 3px solid #00ffcc;
            padding: 1.5rem;
            text-align: center;
        }

        .info-label {
            color: #ff00ff;
            font-size: 10px;
            margin-bottom: 0.5rem;
            display: block;
        }

        .info-value {
            color: #00ffcc;
            font-size: 14px;
            text-shadow: 0 0 5px #00ffcc;
        }

        .members-section {
            margin-top: 2rem;
        }

        .members-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .member-card {
            background-color: #1a1a1a;
            border: 2px solid #ff00ff;
            padding: 1rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
        }

        .member-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 10px #ff00ff;
        }

        .member-number {
            position: absolute;
            top: -10px;
            left: -10px;
            background: #ff00ff;
            color: #111;
            width: 25px;
            height: 25px;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            border: 2px solid #111;
        }

        .member-name {
            color: #00ffcc;
            font-size: 10px;
            margin-top: 0.5rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .stat-card {
            background-color: #1a1a1a;
            border: 2px solid #00ffcc;
            padding: 1rem;
            text-align: center;
        }

        .stat-value {
            color: #ff00ff;
            font-size: 18px;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #00ffcc;
            font-size: 8px;
        }

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

        .team-badge {
            background: linear-gradient(45deg, #ff00ff, #00ffcc);
            color: #111;
            padding: 0.5rem 1rem;
            font-size: 10px;
            border: 2px solid #111;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        /* Animação de pulso para o badge */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .team-badge {
            animation: pulse 2s infinite;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }
            
            .members-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
            
            .pixel-title {
                font-size: 14px;
            }
            
            .btn-pixel {
                font-size: 9px;
                padding: 10px 20px;
            }
        }

        @media (max-width: 480px) {
            .team-info-grid {
                grid-template-columns: 1fr;
            }
            
            .members-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="scanlines"></div>
    
    <div class="container">
        <!-- Cabeçalho -->
        <div class="header">
            <h1 class="pixel-title">🎮 DETALHES DO TIME</h1>
            <a href="{{ route('times.blade') }}" class="btn-pixel btn-secondary">
                ↩️ VOLTAR
            </a>
        </div>

        <!-- Informações principais do time -->
        <div class="pixel-box">
            <div class="team-badge">
                🏁 TIME {{ strtoupper($time->nome_time) }}
            </div>
            
            <h2 class="pixel-subtitle">INFORMAÇÕES GERAIS</h2>
            
            <div class="team-info-grid">
                <div class="info-card">
                    <span class="info-label">👤 NOME DO TIME</span>
                    <div class="info-value">{{ $time->nome_time }}</div>
                </div>
                
                <div class="info-card">
                    <span class="info-label">👥 TOTAL DE INTEGRANTES</span>
                    <div class="info-value">{{ count($time->integrantes) }} CORREDORES</div>
                </div>
                
                <div class="info-card">
                    <span class="info-label">📅 DATA DE CRIAÇÃO</span>
                    <div class="info-value">{{ $time->created_at->format('d/m/Y') }}</div>
                </div>
                
                <div class="info-card">
                    <span class="info-label">🆔 ID DO TIME</span>
                    <div class="info-value">#{{ str_pad($time->id, 4, '0', STR_PAD_LEFT) }}</div>
                </div>
            </div>

            <!-- Estatísticas -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">{{ count($time->integrantes) }}</div>
                    <div class="stat-label">CORREDORES</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-value">{{ $time->created_at->format('d') }}</div>
                    <div class="stat-label">DIA CRIADO</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-value">{{ $time->created_at->format('m') }}</div>
                    <div class="stat-label">MÊS CRIADO</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-value">{{ $time->created_at->format('Y') }}</div>
                    <div class="stat-label">ANO CRIADO</div>
                </div>
            </div>
        </div>

        <!-- Lista de integrantes -->
        <div class="pixel-box">
            <h2 class="pixel-subtitle">👥 INTEGRANTES DO TIME</h2>
            
            <div class="members-grid">
                @foreach($time->integrantes as $index => $integrante)
                <div class="member-card">
                    <div class="member-number">#{{ $index + 1 }}</div>
                    <div style="font-size: 24px;">🏃‍♂️</div>
                    <div class="member-name">{{ $integrante }}</div>
                </div>
                @endforeach
            </div>

            @if(count($time->integrantes) === 0)
            <div style="text-align: center; padding: 2rem; color: #ff00ff;">
                🚫 NENHUM INTEGRANTE CADASTRADO
            </div>
            @endif
        </div>

        <!-- Ações -->
        <div class="action-buttons">
            <a href="{{ route('times.blade') }}" class="btn-pixel btn-secondary">
                🏠 TODOS OS TIMES
            </a>
            
            @auth
            <a href="{{ route('times_create.blade') }}" class="btn-pixel">
                ➕ NOVO TIME
            </a>
            @endauth

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Efeito de digitação no título
            const title = document.querySelector('.pixel-title');
            const originalText = title.textContent;
            title.textContent = '';
            let i = 0;
            
            function typeWriter() {
                if (i < originalText.length) {
                    title.textContent += originalText.charAt(i);
                    i++;
                    setTimeout(typeWriter, 50);
                }
            }
            
            // Inicia o efeito de digitação
            setTimeout(typeWriter, 500);
            
            // Efeito hover nos cards de membros
            const memberCards = document.querySelectorAll('.member-card');
            memberCards.forEach((card, index) => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.05)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
                
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
            
            // Contador animado para estatísticas
            const statValues = document.querySelectorAll('.stat-value');
            statValues.forEach(stat => {
                const finalValue = parseInt(stat.textContent);
                let currentValue = 0;
                const increment = finalValue / 30;
                const timer = setInterval(() => {
                    currentValue += increment;
                    if (currentValue >= finalValue) {
                        stat.textContent = finalValue;
                        clearInterval(timer);
                    } else {
                        stat.textContent = Math.floor(currentValue);
                    }
                }, 50);
            });
        });
    </script>
</body>
</html>