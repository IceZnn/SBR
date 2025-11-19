<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times de Corrida - Pixel Style</title>
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
            max-width: 1000px;
            margin: 0 auto;
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 4px solid #8a4fff;
            padding: 30px;
            box-shadow: 
                0 0 0 4px #5a2d91,
                8px 8px 0 #0f0820,
                0 0 20px rgba(138, 79, 255, 0.3);
            position: relative;
            animation: cardAppear 0.5s ease-out;
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
            position: relative;
        }

        .time-card {
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 3px solid #8a4fff;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .time-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3), 0 0 15px rgba(138, 79, 255, 0.3);
        }

        .time-card::before {
            content: "";
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 2px solid #b27bff;
            z-index: -1;
        }

        .time-nome {
            font-size: 16px;
            color: #b27bff;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .time-info {
            font-size: 10px;
            color: #d4b3ff;
            margin-bottom: 8px;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .btn-pixel {
            background: linear-gradient(to bottom, #8a4fff, #6a3fd8);
            color: white;
            border: none;
            border-bottom: 3px solid #5a2d91;
            border-right: 3px solid #5a2d91;
            padding: 12px 20px;
            font-family: 'Press Start 2P', cursive;
            font-size: 10px;
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
            text-decoration: none;
            color: white;
        }

        .btn-pixel:active {
            background: linear-gradient(to bottom, #7a3fef, #5a2fc8);
            transform: translate(3px, 3px);
            border-bottom-width: 0;
            border-right-width: 0;
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

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #d4b3ff;
            font-size: 12px;
            background: rgba(26, 15, 46, 0.5);
            border: 1px solid #5a2d91;
        }

        .empty-state div:first-child {
            font-size: 16px;
            color: #b27bff;
            margin-bottom: 15px;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        /* Pixel Decorations */
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

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .pixel-title {
                font-size: 18px;
            }
            
            .time-card {
                padding: 15px;
            }
            
            .action-buttons {
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
                padding: 10px 15px;
                font-size: 8px;
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
        
        <h1 class="pixel-title">🏁 TIMES DE CORRIDA 🏁</h1>

        @if(session('success'))
            <div class="status-message">
                ✅ {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('times_create.blade') }}" class="btn-pixel">➕ NOVO TIME</a>

        <div style="margin-top: 30px;">
            @foreach($times as $time)
            <div class="time-card">
                <div class="pixel-decoration pixel-1"></div>
                <div class="pixel-decoration pixel-2"></div>
                <div class="pixel-decoration pixel-3"></div>
                <div class="pixel-decoration pixel-4"></div>
                
                <div class="time-nome">{{ $time->nome_time }}</div>
                <div class="time-info"><strong>Integrantes:</strong> {{ implode(', ', $time->integrantes) }}</div>
                <div class="time-info"><strong>Total:</strong> {{ $time->numero_integrantes }} corredores</div>
                
                <!-- BOTÕES DE AÇÃO ÚNICOS -->
                <div class="action-buttons">
                    <a href="{{ route('times_ver.blade', $time) }}" class="btn-pixel btn-success">👁️ VER</a>
                    <a href="{{ route('times_edit.blade', $time) }}" class="btn-pixel btn-warning">✏️ EDITAR</a>
                    <form action="{{ route('times.destroy', $time) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-pixel btn-danger" 
                                onclick="return confirm('Deletar time {{ $time->nome_time }}?')">
                            🗑️ DELETAR
                        </button>
                    </form>
                </div>
            </div>
            @endforeach

            @if($times->isEmpty())
            <div class="time-card">
                <div class="empty-state">
                    <div>🎯 NENHUM TIME CADASTRADO</div>
                    <div>Clique no botão acima para criar times!</div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- BOTÃO RANKING -->
    
    <div style="text-align: center; margin: 25px 0;">
        <a href="{{ route('ranking.blade') }}" class="btn-pixel" style="
            background: linear-gradient(135deg, #ffd93d, #ffb347); 
            border-bottom: 4px solid #b36b00; 
            border-right: 4px solid #b36b00; 
            color: #5a2d91; 
            font-size: 16px; 
            padding: 20px 35px; 
            margin: 12px; 
            display: inline-block; 
            min-width: 180px;
            text-shadow: 1px 1px 0 rgba(255,255,255,0.3);
            box-shadow: 0 6px 12px rgba(255, 217, 61, 0.3);
            transition: all 0.3s ease;
        " onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 16px rgba(255,217,61,0.4)'" 
        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 12px rgba(255,217,61,0.3)'">
            <br>RANKING
        </a>

        <a href="{{ route('corrida.selecionar') }}" class="btn-pixel" style="
            background: linear-gradient(135deg, #4ecdc4, #44a08d); 
            border-bottom: 4px solid #2a8c85; 
            border-right: 4px solid #2a8c85; 
            font-size: 16px; 
            padding: 20px 35px; 
            margin: 12px; 
            display: inline-block; 
            min-width: 180px;
            text-shadow: 1px 1px 0 rgba(255,255,255,0.3);
            box-shadow: 0 6px 12px rgba(78, 205, 196, 0.3);
            transition: all 0.3s ease;
        " onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 16px rgba(78,205,196,0.4)'" 
        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 12px rgba(78,205,196,0.3)'">
            <br>NOVA CORRIDA
        </a>

        <a href="{{ route('dashboard') }}" class="btn-pixel" style="
            background: linear-gradient(135deg, #b27bff, #8a4fff); 
            border-bottom: 4px solid #5a2d91; 
            border-right: 4px solid #5a2d91; 
            font-size: 16px; 
            padding: 20px 35px; 
            margin: 12px; 
            display: inline-block; 
            min-width: 180px;
            text-shadow: 1px 1px 0 rgba(255,255,255,0.3);
            box-shadow: 0 6px 12px rgba(138, 79, 255, 0.3);
            transition: all 0.3s ease;
        " onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 16px rgba(138,79,255,0.4)'" 
        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 12px rgba(138,79,255,0.3)'">
            <br>INÍCIO
    </a>
    </div>
        
    

    <script>
        // Efeitos interativos
        document.addEventListener('DOMContentLoaded', function() {
            const timeCards = document.querySelectorAll('.time-card');
            
            timeCards.forEach((card, index) => {
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

            // Efeito nos botões
            const buttons = document.querySelectorAll('.btn-pixel');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translate(2px, 2px)';
                });
                
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translate(0, 0)';
                });
            });
        });
    </script>
</body>
</html>