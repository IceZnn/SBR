<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pixel Race</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background-image: 
                linear-gradient(rgba(26, 15, 46, 0.9), rgba(26, 15, 46, 0.9)),
                repeating-linear-gradient(0deg, transparent, transparent 4px, rgba(80, 20, 120, 0.2) 4px, rgba(80, 20, 120, 0.2) 8px);
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            border: 4px solid #8a4fff;
            background-color: #2d1a4a;
            box-shadow: 
                0 0 0 4px #5a2d91,
                8px 8px 0 #0f0820;
            padding: 30px 25px;
            position: relative;
        }

        .login-container::before {
            content: "";
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 2px solid #b27bff;
            z-index: -1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px dotted #8a4fff;
        }

        .login-title {
            font-size: 24px;
            color: #b27bff;
            text-shadow: 3px 3px 0 #5a2d91;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .login-subtitle {
            font-size: 10px;
            color: #d4b3ff;
        }

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
            font-family: 'Press Start 2P', cursive, monospace;
            font-size: 10px;
            outline: none;
        }

        .form-input:focus {
            border-color: #b27bff;
            box-shadow: 0 0 0 2px #d4b3ff;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 8px;
            margin-top: 5px;
            text-shadow: 1px 1px 0 #8b0000;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-checkbox {
            appearance: none;
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            background-color: #1a0f2e;
            border: 2px solid #8a4fff;
            position: relative;
            cursor: pointer;
            margin-right: 8px;
        }

        .remember-checkbox:checked {
            background-color: #8a4fff;
        }

        .remember-checkbox:checked::after {
            content: "✓";
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 10px;
        }

        .remember-label {
            font-size: 10px;
            color: #d4b3ff;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }

        .register-link {
            color: #b27bff;
            font-size: 10px;
            text-decoration: none;
            transition: color 0.2s;
        }

        .register-link:hover {
            color: #d4b3ff;
            text-decoration: underline;
        }

        .submit-button {
            background-color: #8a4fff;
            color: white;
            border: none;
            border-bottom: 4px solid #5a2d91;
            border-right: 4px solid #5a2d91;
            padding: 12px 20px;
            font-family: 'Press Start 2P', cursive, monospace;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.1s;
        }

        .submit-button:hover {
            background-color: #9a5fff;
            transform: translate(2px, 2px);
            border-bottom-width: 2px;
            border-right-width: 2px;
        }

        .submit-button:active {
            background-color: #7a3fef;
            transform: translate(4px, 4px);
            border-bottom-width: 0;
            border-right-width: 0;
        }

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
            z-index: 100;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 20px 15px;
            }
            
            .login-title {
                font-size: 20px;
            }
            
            .form-footer {
                flex-direction: column;
                gap: 15px;
            }
            
            .submit-button {
                width: 100%;
            }
            
            .register-link {
                margin-bottom: 10px;
            }
        }
    </style>
    
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
    <div class="scanlines"></div>
    
    <div class="login-container">
        <div class="pixel-decoration pixel-1"></div>
        <div class="pixel-decoration pixel-2"></div>
        <div class="pixel-decoration pixel-3"></div>
        <div class="pixel-decoration pixel-4"></div>

        <div class="login-header">
            <h1 class="login-title">LOGIN</h1>
            <p class="login-subtitle">ACESSAR CONTA</p>
        </div>

        <form method="POST" action="#">
            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">EMAIL</label>
                <input id="email" class="form-input" type="email" name="email" required autocomplete="username" />
                <div class="error-message">
                    <!-- Mensagens de erro do email aparecerão aqui -->
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">SENHA</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
                <div class="error-message">
                    <!-- Mensagens de erro da senha aparecerão aqui -->
                </div>
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input type="checkbox" id="remember_me" class="remember-checkbox" name="remember">
                <label for="remember_me" class="remember-label">LEMBRAR DE MIM</label>
            </div>

            <div class="form-footer">
                <a class="register-link" href="{{"register"}}">
                    CRIAR CONTA
                </a>

                <button type="submit" class="submit-button">
                    ENTRAR
                </button>
            </div>
        </form>
    </div>

    <script>
        // Efeitos de foco nos inputs
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.style.boxShadow = '0 0 0 2px #d4b3ff, 0 0 10px #b27bff';
            });
            
            input.addEventListener('blur', function() {
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>
</html>