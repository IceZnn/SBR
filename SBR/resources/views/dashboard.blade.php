<x-app-layout>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pixel Style</title>
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
                linear-gradient(rgba(26, 15, 46, 0.9), rgba(26, 15, 46, 0.9)),
                repeating-linear-gradient(0deg, transparent, transparent 4px, rgba(80, 20, 120, 0.2) 4px, rgba(80, 20, 120, 0.2) 8px);
        }

        /* Header */
        .dashboard-header {
            background-color: #2d1a4a;
            border-bottom: 4px solid #8a4fff;
            padding: 20px 0;
            box-shadow: 0 4px 0 #5a2d91;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            font-size: 18px;
            color: #b27bff;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info {
            font-size: 10px;
            color: #d4b3ff;
        }

        .logout-button {
            background-color: #8a4fff;
            color: white;
            border: none;
            border-bottom: 3px solid #5a2d91;
            border-right: 3px solid #5a2d91;
            padding: 8px 15px;
            font-family: 'Press Start 2P', cursive;
            font-size: 8px;
            cursor: pointer;
            transition: all 0.1s;
        }

        .logout-button:hover {
            background-color: #9a5fff;
            transform: translate(2px, 2px);
            border-bottom-width: 1px;
            border-right-width: 1px;
        }

        /* Main Content */
        .dashboard-main {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .welcome-container {
            border: 4px solid #8a4fff;
            background-color: #2d1a4a;
            box-shadow: 
                0 0 0 4px #5a2d91,
                8px 8px 0 #0f0820;
            padding: 40px;
            position: relative;
            margin-bottom: 30px;
        }

        .welcome-container::before {
            content: "";
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 2px solid #b27bff;
            z-index: -1;
        }

        .welcome-title {
            font-size: 24px;
            color: #b27bff;
            text-shadow: 3px 3px 0 #5a2d91;
            margin-bottom: 20px;
            text-align: center;
        }

        .welcome-message {
            font-size: 14px;
            color: #d4b3ff;
            text-align: center;
            line-height: 1.6;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .stat-card {
            border: 3px solid #8a4fff;
            background-color: #2d1a4a;
            padding: 20px;
            position: relative;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 2px solid #b27bff;
            z-index: -1;
        }

        .stat-icon {
            font-size: 24px;
            color: #b27bff;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 24px;
            color: #b27bff;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 10px;
            color: #d4b3ff;
        }

        /* Navigation */
        .nav-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 30px;
        }

        .nav-button {
            background-color: #8a4fff;
            color: white;
            border: none;
            border-bottom: 3px solid #5a2d91;
            border-right: 3px solid #5a2d91;
            padding: 15px;
            font-family: 'Press Start 2P', cursive;
            font-size: 10px;
            cursor: pointer;
            transition: all 0.1s;
            text-align: center;
        }

        .nav-button:hover {
            background-color: #9a5fff;
            transform: translate(2px, 2px);
            border-bottom-width: 1px;
            border-right-width: 1px;
        }

        .nav-button:active {
            background-color: #7a3fef;
            transform: translate(3px, 3px);
            border-bottom-width: 0;
            border-right-width: 0;
        }

        /* Pixel Decorations */
        .pixel-decoration {
            position: absolute;
            width: 8px;
            height: 8px;
            background-color: #b27bff;
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

        /* Status Message */
        .status-message {
            background-color: #5a2d91;
            border: 3px solid #90ee90;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #90ee90;
            text-align: center;
            text-shadow: 1px 1px 0 #006400;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .welcome-container {
                padding: 20px;
            }
            
            .welcome-title {
                font-size: 18px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .nav-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .dashboard-main {
                padding: 20px 10px;
            }
            
            .welcome-container {
                padding: 15px;
            }
            
            .welcome-title {
                font-size: 16px;
            }
            
            .welcome-message {
                font-size: 12px;
            }
        }
    </style>
    
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="scanlines"></div>
    
    <!-- Header -->
    

        <!-- Welcome Card -->
        <div class="welcome-container">
            <div class="pixel-decoration pixel-1"></div>
            <div class="pixel-decoration pixel-2"></div>
            <div class="pixel-decoration pixel-3"></div>
            <div class="pixel-decoration pixel-4"></div>
            
            <h1 class="welcome-title">🎯 LOGGADO</h1>
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-button">🚪 SAIR</button>
                        </form>
            <div class="welcome-message">
                BEM-VINDO AO SISTEMA DE TIMES DE CORRIDA!<br>
                VOCÊ ESTÁ CONECTADO E PRONTO PARA GERENCIAR SEUS TIMES.
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="pixel-decoration pixel-1"></div>
                <div class="pixel-decoration pixel-2"></div>
                <div class="pixel-decoration pixel-3"></div>
                <div class="pixel-decoration pixel-4"></div>
                <div class="stat-icon">👥</div>
                <div class="stat-number">3</div>
                <div class="stat-label">TIMES ATIVOS</div>
            </div>

            <div class="stat-card">
                <div class="pixel-decoration pixel-1"></div>
                <div class="pixel-decoration pixel-2"></div>
                <div class="pixel-decoration pixel-3"></div>
                <div class="pixel-decoration pixel-4"></div>
                <div class="stat-icon">🚀</div>
                <div class="stat-number">8</div>
                <div class="stat-label">CORREDORES</div>
            </div>

            <div class="stat-card">
                <div class="pixel-decoration pixel-1"></div>
                <div class="pixel-decoration pixel-2"></div>
                <div class="pixel-decoration pixel-3"></div>
                <div class="pixel-decoration pixel-4"></div>
                <div class="stat-icon">⭐</div>
                <div class="stat-number">12</div>
                <div class="stat-label">CORRIDAS</div>
            </div>

            <div class="stat-card">
                <div class="pixel-decoration pixel-1"></div>
                <div class="pixel-decoration pixel-2"></div>
                <div class="pixel-decoration pixel-3"></div>
                <div class="pixel-decoration pixel-4"></div>
                <div class="stat-icon">🏆</div>
                <div class="stat-number">5</div>
                <div class="stat-label">VITÓRIAS</div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="nav-grid">
            <button class="nav-button" onclick="navigate('teams')">
                👥 GERENCIAR TIMES
            </button>
            <button class="nav-button" onclick="navigate('races')">
                🏁 VER CORRIDAS
            </button>
            <button class="nav-button" onclick="navigate('profile')">
                👤 MEU PERFIL
            </button>
            <button class="nav-button" onclick="navigate('ranking')">
                🏆 RANKING
            </button>
        </div>
    </main>

    <script>
        function logout() {
            if (confirm('TEM CERTEZA QUE DESEJA SAIR?')) {
                // Simular logout
                const buttons = document.querySelectorAll('.nav-button, .logout-button');
                buttons.forEach(btn => btn.disabled = true);
                
                document.querySelector('.status-message').textContent = '🚪 SAINDO DO SISTEMA...';
                document.querySelector('.status-message').style.borderColor = '#ff6b6b';
                document.querySelector('.status-message').style.color = '#ff6b6b';
                
                setTimeout(() => {
                    window.location.href = '/login';
                }, 1500);
            }
        }

        function navigate(page) {
            // Simular navegação
            const button = event.target;
            const originalText = button.textContent;
            
            button.textContent = 'CARREGANDO...';
            button.disabled = true;
            
            setTimeout(() => {
                button.textContent = originalText;
                button.disabled = false;
                
                document.querySelector('.status-message').textContent = `🎮 NAVEGANDO PARA ${page.toUpperCase()}...`;
                
                // Aqui você redirecionaria para a página real
                // window.location.href = `/${page}`;
            }, 1000);
        }

        // Efeito de digitação no título
        document.addEventListener('DOMContentLoaded', function() {
            const welcomeMessage = document.querySelector('.welcome-message');
            const originalText = welcomeMessage.textContent;
            welcomeMessage.textContent = '';
            
            let i = 0;
            const typeWriter = setInterval(() => {
                if (i < originalText.length) {
                    welcomeMessage.textContent += originalText.charAt(i);
                    i++;
                } else {
                    clearInterval(typeWriter);
                }
            }, 50);
        });
    </script>
</body>
</html>
</x-app-layout>