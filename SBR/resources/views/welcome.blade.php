<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>🏁 PIXEL RACING</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            image-rendering: pixelated;
        }

        body {
            font-family: 'Courier New', monospace;
            background-color: #1a0f2e;
            color: #fff;
            min-height: 100vh;
            background-image: 
                linear-gradient(rgba(26, 15, 46, 0.9), rgba(26, 15, 46, 0.9)),
                repeating-linear-gradient(0deg, transparent, transparent 4px, rgba(80, 20, 120, 0.2) 4px, rgba(80, 20, 120, 0.2) 8px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
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

        .container {
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 4px solid #8a4fff;
            padding: 40px;
            box-shadow: 
                0 0 0 4px #5a2d91,
                8px 8px 0 #0f0820,
                0 0 20px rgba(138, 79, 255, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
            position: relative;
            animation: pixelAppear 0.5s ease-out;
        }

        @keyframes pixelAppear {
            from { 
                opacity: 0; 
                transform: translateY(20px) scale(0.95);
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1);
            }
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

        .logo {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 3px 3px 0 #5a2d91;
            animation: logoGlow 2s infinite alternate;
        }

        @keyframes logoGlow {
            from { text-shadow: 3px 3px 0 #5a2d91, 0 0 10px rgba(178, 123, 255, 0.5); }
            to { text-shadow: 3px 3px 0 #5a2d91, 0 0 20px rgba(178, 123, 255, 0.8); }
        }

        h1 {
            color: #b27bff;
            margin-bottom: 15px;
            font-size: 24px;
            text-shadow: 2px 2px 0 #5a2d91;
            font-weight: bold;
        }

        .subtitle {
            color: #d4b3ff;
            margin-bottom: 30px;
            font-size: 14px;
            line-height: 1.4;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            background: linear-gradient(to bottom, #8a4fff, #6a3fd8);
            color: white;
            border: none;
            border-bottom: 3px solid #5a2d91;
            border-right: 3px solid #5a2d91;
            padding: 15px 25px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.1s;
            text-shadow: 1px 1px 0 #5a2d91;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            display: block;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            background: linear-gradient(to bottom, #9a5fff, #7a4fe8);
            transform: translate(2px, 2px);
            border-bottom-width: 1px;
            border-right-width: 1px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn:active {
            background: linear-gradient(to bottom, #7a3fef, #5a2fc8);
            transform: translate(3px, 3px);
            border-bottom-width: 0;
            border-right-width: 0;
        }

        .btn-secondary {
            background: linear-gradient(to bottom, #4ecdc4, #3ebdb4);
            border-bottom: 3px solid #2a8c85;
            border-right: 3px solid #2a8c85;
        }

        .btn-secondary:hover {
            background: linear-gradient(to bottom, #5eddd4, #4ecdc4);
        }

        .features {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #8a4fff;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            color: #d4b3ff;
            font-size: 12px;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .feature-icon {
            width: 16px;
            height: 16px;
            background: #8a4fff;
            border: 2px solid #5a2d91;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 8px;
            flex-shrink: 0;
        }

        .pixel-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(138, 79, 255, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(138, 79, 255, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            pointer-events: none;
            z-index: -1;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 20px;
            }
            
            .logo {
                font-size: 36px;
            }
            
            .btn {
                padding: 12px 20px;
                font-size: 12px;
            }
        }

        /* Efeito de digitação no subtítulo */
        .typewriter {
            overflow: hidden;
            border-right: 2px solid #b27bff;
            white-space: nowrap;
            margin: 0 auto;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #b27bff }
        }
    </style>
</head>
<body>
    <div class="scanlines"></div>
    <div class="pixel-grid"></div>
    
    <div class="container">
        <div class="pixel-decoration pixel-1"></div>
        <div class="pixel-decoration pixel-2"></div>
        <div class="pixel-decoration pixel-3"></div>
        <div class="pixel-decoration pixel-4"></div>
        
        <div class="logo">🏁</div>
        <h1>PIXEL RACING</h1>
        <p class="subtitle typewriter">SISTEMA DE TIMES DE CORRIDA</p>
        
        <div class="button-group">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn">
                        🎮 ENTRAR NO SISTEMA
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn">
                        🔐 ACESSAR CONTA
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary">
                            📝 NOVA CONTA
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <div class="features">
            <div class="feature">
                <div class="feature-icon">✓</div>
                <span>GERENCIE SEUS TIMES</span>
            </div>
            <div class="feature">
                <div class="feature-icon">✓</div>
                <span>ACOMPANHE CORRIDAS</span>
            </div>
            <div class="feature">
                <div class="feature-icon">✓</div>
                <span>ESTILO RETRO PIXEL</span>
            </div>
        </div>
    </div>

    <script>
        // Efeito de partículas pixeladas
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.container');
            const particles = 20;
            
            for (let i = 0; i < particles; i++) {
                const particle = document.createElement('div');
                particle.style.cssText = `
                    position: absolute;
                    width: 4px;
                    height: 4px;
                    background-color: #b27bff;
                    border-radius: 0;
                    pointer-events: none;
                    z-index: -1;
                `;
                
                // Posição aleatória ao redor do container
                const angle = Math.random() * Math.PI * 2;
                const distance = 100 + Math.random() * 50;
                const x = Math.cos(angle) * distance;
                const y = Math.sin(angle) * distance;
                
                particle.style.left = `calc(50% + ${x}px)`;
                particle.style.top = `calc(50% + ${y}px)`;
                particle.style.animation = `float ${3 + Math.random() * 2}s infinite linear`;
                
                document.body.appendChild(particle);
            }
        });

        // Adicionar keyframes para animação de flutuação
        const style = document.createElement('style');
        style.textContent = `
            @keyframes float {
                0%, 100% {
                    transform: translate(0, 0) rotate(0deg);
                    opacity: 0;
                }
                10%, 90% {
                    opacity: 0.7;
                }
                50% {
                    transform: translate(${Math.random() * 20 - 10}px, ${Math.random() * 20 - 10}px) rotate(180deg);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>