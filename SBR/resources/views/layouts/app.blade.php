<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
           
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistema de Times') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        
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

            /* Navigation */
            .main-nav {
                background-color: #2d1a4a;
                border-bottom: 4px solid #8a4fff;
                padding: 15px 0;
                box-shadow: 0 4px 0 #5a2d91;
            }

            .nav-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .nav-brand {
                font-size: 16px;
                color: #b27bff;
                text-shadow: 2px 2px 0 #5a2d91;
                text-decoration: none;
            }

            .nav-brand:hover {
                color: #d4b3ff;
            }

            .nav-links {
                display: flex;
                gap: 20px;
                align-items: center;
            }

            .nav-link {
                color: #d4b3ff;
                text-decoration: none;
                font-size: 10px;
                padding: 8px 12px;
                border: 2px solid transparent;
                transition: all 0.2s;
            }

            .nav-link:hover {
                color: #b27bff;
                border: 2px solid #8a4fff;
            }

            .nav-button {
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

            .nav-button:hover {
                background-color: #9a5fff;
                transform: translate(2px, 2px);
                border-bottom-width: 1px;
                border-right-width: 1px;
            }

            /* Page Header */
            .page-header {
                background-color: #2d1a4a;
                border-bottom: 3px solid #8a4fff;
                padding: 20px 0;
            }

            .header-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }

            .header-title {
                font-size: 18px;
                color: #b27bff;
                text-shadow: 2px 2px 0 #5a2d91;
            }

            /* Main Content */
            main {
                min-height: calc(100vh - 140px);
                padding: 30px 20px;
                max-width: 1200px;
                margin: 0 auto;
            }

            .content-card {
                border: 4px solid #8a4fff;
                background-color: #2d1a4a;
                box-shadow: 
                    0 0 0 4px #5a2d91,
                    8px 8px 0 #0f0820;
                padding: 30px;
                position: relative;
            }

            .content-card::before {
                content: "";
                position: absolute;
                top: -8px;
                left: -8px;
                right: -8px;
                bottom: -8px;
                border: 2px solid #b27bff;
                z-index: -1;
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

            /* Scanlines */
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

            /* Status Messages */
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

            .status-error {
                border-color: #ff6b6b;
                color: #ff6b6b;
                text-shadow: 1px 1px 0 #8b0000;
            }

            /* Buttons */
            .btn-primary {
                background-color: #8a4fff;
                color: white;
                border: none;
                border-bottom: 4px solid #5a2d91;
                border-right: 4px solid #5a2d91;
                padding: 12px 20px;
                font-family: 'Press Start 2P', cursive;
                font-size: 10px;
                cursor: pointer;
                transition: all 0.1s;
            }

            .btn-primary:hover {
                background-color: #9a5fff;
                transform: translate(2px, 2px);
                border-bottom-width: 2px;
                border-right-width: 2px;
            }

            .btn-primary:active {
                background-color: #7a3fef;
                transform: translate(4px, 4px);
                border-bottom-width: 0;
                border-right-width: 0;
            }

            /* Forms */
            .form-group {
                margin-bottom: 20px;
            }

            .form-label {
                display: block;
                font-size: 12px;
                color: #b27bff;
                margin-bottom: 8px;
                text-shadow: 2px 2px 0 #5a2d91;
            }

            .form-input {
                width: 100%;
                padding: 12px;
                background-color: #1a0f2e;
                border: 3px solid #8a4fff;
                color: #fff;
                font-family: 'Press Start 2P', cursive;
                font-size: 10px;
                outline: none;
            }

            .form-input:focus {
                border-color: #b27bff;
                box-shadow: 0 0 0 2px #d4b3ff;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .nav-container {
                    flex-direction: column;
                    gap: 15px;
                }

                .nav-links {
                    flex-wrap: wrap;
                    justify-content: center;
                }

                .content-card {
                    padding: 20px;
                }

                .header-title {
                    font-size: 16px;
                    text-align: center;
                }
            }

            @media (max-width: 480px) {
                main {
                    padding: 20px 10px;
                }

                .content-card {
                    padding: 15px;
                }

                .nav-link {
                    font-size: 8px;
                    padding: 6px 8px;
                }

                .btn-primary {
                    padding: 10px 15px;
                    font-size: 8px;
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="scanlines"></div>
        
        <!-- Navigation -->
        <nav class="main-nav">
            <div class="nav-container">
                <a href="{{ url('/') }}" class="nav-brand">
                    🎮 {{ config('app.name', 'SISTEMA DE TIMES') }}
                </a>
                
                <div class="nav-links">
                    @auth
                        <a href="{{ route('dashboard') }}" class="nav-link">🏠 DASHBOARD</a>
                        <a href="#" class="nav-link">👥 TIMES</a>
                        <a href="#" class="nav-link">🏁 CORRIDAS</a>
                        <a href="#" class="nav-link">👤 PERFIL</a>
                        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-button">🚪 SAIR</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">🔑 ENTRAR</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link">📝 CADASTRAR</a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @isset($header)
            <header class="page-header">
                <div class="header-container">
                    <h1 class="header-title">{{ $header }}</h1>
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="status-message status-error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="content-card">
                <div class="pixel-decoration pixel-1"></div>
                <div class="pixel-decoration pixel-2"></div>
                <div class="pixel-decoration pixel-3"></div>
                <div class="pixel-decoration pixel-4"></div>
                
                {{ $slot }}
            </div>
        </main>

        <script>
            // Efeitos interativos
            document.addEventListener('DOMContentLoaded', function() {
                // Efeito de foco nos inputs
                const inputs = document.querySelectorAll('.form-input');
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.style.boxShadow = '0 0 0 2px #d4b3ff, 0 0 10px #b27bff';
                    });
                    
                    input.addEventListener('blur', function() {
                        this.style.boxShadow = 'none';
                    });
                });

                // Confirmação para logout
                const logoutForm = document.querySelector('form[action*="logout"]');
                if (logoutForm) {
                    logoutForm.addEventListener('submit', function(e) {
                        if (!confirm('TEM CERTEZA QUE DESEJA SAIR?')) {
                            e.preventDefault();
                        }
                    });
                }

                // Efeito de digitação para mensagens de status
                const statusMessages = document.querySelectorAll('.status-message');
                statusMessages.forEach(message => {
                    if (message.textContent.length > 0) {
                        const originalText = message.textContent;
                        message.textContent = '';
                        
                        let i = 0;
                        const typeWriter = setInterval(() => {
                            if (i < originalText.length) {
                                message.textContent += originalText.charAt(i);
                                i++;
                            } else {
                                clearInterval(typeWriter);
                            }
                        }, 30);
                    }
                });
            });
        </script>
    
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
