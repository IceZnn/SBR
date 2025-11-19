<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        }

        /* Header */
        .dashboard-header {
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border-bottom: 4px solid #8a4fff;
            padding: 20px 0;
            box-shadow: 0 4px 0 #5a2d91, 0 8px 16px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .dashboard-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #b27bff, transparent);
            animation: headerGlow 3s infinite;
        }

        @keyframes headerGlow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
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
            text-shadow: 2px 2px 0 #5a2d91, 0 0 10px rgba(178, 123, 255, 0.5);
            position: relative;
            padding: 5px 10px;
            background: rgba(42, 21, 74, 0.7);
            border: 2px solid #8a4fff;
            box-shadow: 0 0 10px rgba(138, 79, 255, 0.3);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info {
            font-size: 10px;
            color: #d4b3ff;
            text-shadow: 1px 1px 0 #5a2d91;
            background: rgba(42, 21, 74, 0.7);
            padding: 5px 10px;
            border: 1px solid #8a4fff;
        }

        .logout-button {
            background: linear-gradient(to bottom, #8a4fff, #6a3fd8);
            color: white;
            border: none;
            border-bottom: 3px solid #5a2d91;
            border-right: 3px solid #5a2d91;
            padding: 8px 15px;
            font-family: 'Press Start 2P', cursive;
            font-size: 8px;
            cursor: pointer;
            transition: all 0.1s;
            text-shadow: 1px 1px 0 #5a2d91;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .logout-button:hover {
            background: linear-gradient(to bottom, #9a5fff, #7a4fe8);
            transform: translate(2px, 2px);
            border-bottom-width: 1px;
            border-right-width: 1px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Main Content */
        .dashboard-main {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .welcome-container {
            border: 4px solid #8a4fff;
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            box-shadow: 
                0 0 0 4px #5a2d91,
                8px 8px 0 #0f0820,
                0 0 20px rgba(138, 79, 255, 0.3);
            padding: 40px;
            position: relative;
            margin-bottom: 30px;
            animation: cardAppear 0.5s ease-out;
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
            text-shadow: 3px 3px 0 #5a2d91, 0 0 15px rgba(178, 123, 255, 0.5);
            margin-bottom: 20px;
            text-align: center;
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            background: rgba(42, 21, 74, 0.7);
            border: 2px solid #8a4fff;
            width: 100%;
            box-sizing: border-box;
        }

        .welcome-message {
            font-size: 14px;
            color: #d4b3ff;
            text-align: center;
            line-height: 1.6;
            text-shadow: 1px 1px 0 #5a2d91;
            margin-top: 20px;
            padding: 20px;
            background: rgba(26, 15, 46, 0.5);
            border: 1px solid #5a2d91;
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
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            padding: 20px;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3), 0 0 15px rgba(138, 79, 255, 0.3);
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
            text-shadow: 0 0 10px rgba(178, 123, 255, 0.5);
        }

        .stat-number {
            font-size: 24px;
            color: #b27bff;
            margin-bottom: 5px;
            text-shadow: 2px 2px 0 #5a2d91;
        }

        .stat-label {
            font-size: 10px;
            color: #d4b3ff;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        /* Navigation */
        .nav-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 30px;
        }

        .nav-button {
            background: linear-gradient(to bottom, #8a4fff, #6a3fd8);
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
            text-shadow: 1px 1px 0 #5a2d91;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .nav-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .nav-button:hover::before {
            left: 100%;
        }

        .nav-button:hover {
            background: linear-gradient(to bottom, #9a5fff, #7a4fe8);
            transform: translate(2px, 2px);
            border-bottom-width: 1px;
            border-right-width: 1px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .nav-button:active {
            background: linear-gradient(to bottom, #7a3fef, #5a2fc8);
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

        /* Status Message */
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

        /* Floating particles effect */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background-color: rgba(178, 123, 255, 0.5);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) translateX(20px);
                opacity: 0;
            }
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
    <div class="particles" id="particles"></div>
    
    <!-- Header -->
    <header class="dashboard-header">
        <div class="header-content">
            <h1 class="header-title">PIXEL RACE</h1>
            <div class="user-menu">
                
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-button">🚪 SAIR</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="dashboard-main">
        <!-- Status Message -->
        <div class="status-message">
            SISTEMA CONECTADO
        </div>

        <!-- Welcome Card -->
        <div class="welcome-container">
            <div class="pixel-decoration pixel-1"></div>
            <div class="pixel-decoration pixel-2"></div>
            <div class="pixel-decoration pixel-3"></div>
            <div class="pixel-decoration pixel-4"></div>
            
            <h1 class="welcome-title">🎯 LOGADO</h1>
            
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
            <a class="nav-button" href="{{ route('times.blade') }}">
                👥 GERENCIAR TIMES
            </a>
            <a class="nav-button" href="{{ route('corrida.selecionar') }}">
                🏁 VER CORRIDAS
            </a>
            <a class="nav-button" href="#">
                👤 MEU PERFIL
            </a>
            <a class="nav-button" href="{{ route('ranking.blade') }}">
                🏆 RANKING
            </a>
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
            
            // Criar partículas flutuantes
            createParticles();
        });
        
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Posição aleatória
                const left = Math.random() * 100;
                const animationDuration = 15 + Math.random() * 15;
                const animationDelay = Math.random() * 15;
                
                particle.style.left = `${left}%`;
                particle.style.animationDuration = `${animationDuration}s`;
                particle.style.animationDelay = `${animationDelay}s`;
                
                particlesContainer.appendChild(particle);
            }
        }
    </script>
</body>
</html>