<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Time - Pixel Style</title>
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
            max-width: 700px;
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

        .form-card {
            background: linear-gradient(135deg, #2d1a4a 0%, #3d236a 100%);
            border: 3px solid #8a4fff;
            padding: 25px;
            margin-bottom: 20px;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-card::before {
            content: "";
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 2px solid #b27bff;
            z-index: -1;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 12px;
            color: #b27bff;
            font-size: 12px;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .form-input {
            width: 100%;
            padding: 15px;
            border: 3px solid #8a4fff;
            background: rgba(26, 15, 46, 0.8);
            color: #d4b3ff;
            font-family: 'Press Start 2P', cursive;
            font-size: 10px;
            box-shadow: 4px 4px 0 #5a2d91;
            box-sizing: border-box;
            transition: all 0.2s;
        }

        .form-input:focus {
            outline: none;
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 #5a2d91;
            border-color: #b27bff;
            background: rgba(26, 15, 46, 0.9);
        }

        .form-input::placeholder {
            color: #8a4fff;
            opacity: 0.6;
        }

        textarea.form-input {
            resize: vertical;
            min-height: 120px;
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

        .btn-secondary {
            background: linear-gradient(to bottom, #95a5a6, #859596);
            border-bottom: 3px solid #6c7b7d;
            border-right: 3px solid #6c7b7d;
        }

        .btn-secondary:hover {
            background: linear-gradient(to bottom, #a5b5b6, #95a5a6);
        }

        .instructions {
            background: rgba(178, 123, 255, 0.1);
            border: 2px solid #b27bff;
            padding: 20px;
            margin-bottom: 25px;
            font-size: 10px;
            color: #d4b3ff;
            line-height: 1.6;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .instructions strong {
            color: #b27bff;
            font-size: 11px;
        }

        .character-count {
            text-align: right;
            font-size: 8px;
            color: #d4b3ff;
            margin-top: 8px;
            text-shadow: 1px 1px 0 #5a2d91;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 30px;
            justify-content: center;
        }

        .error-card {
            background: linear-gradient(135deg, #5a2d91 0%, #6a3da1 100%);
            border: 3px solid #ff6b6b;
            padding: 20px;
            margin-bottom: 20px;
            font-size: 10px;
            color: #ff6b6b;
            text-shadow: 1px 1px 0 #8b0000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .error-card ul {
            margin: 10px 0;
            padding-left: 20px;
        }

        .error-card li {
            margin-bottom: 5px;
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
            
            .form-card {
                padding: 20px;
            }
            
            .form-actions {
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
            
            .form-input {
                padding: 12px;
                font-size: 9px;
            }
            
            .btn-pixel {
                padding: 10px 15px;
                font-size: 9px;
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
        
        <h1 class="pixel-title">➕ CRIAR TIME</h1>

        <div class="instructions">
            <strong>🎮 INSTRUÇÕES:</strong><br>
            • Digite o nome do time<br>
            • Liste os integrantes separados por VÍRGULA<br>
            • Exemplo: <em>João, Maria, Pedro, Ana</em>
        </div>

        <div class="form-card">
            <div class="pixel-decoration pixel-1"></div>
            <div class="pixel-decoration pixel-2"></div>
            <div class="pixel-decoration pixel-3"></div>
            <div class="pixel-decoration pixel-4"></div>
            
            <form action="{{ route('times.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="nome_time" class="form-label">🎯 NOME DO TIME</label>
                    <input 
                        type="text" 
                        id="nome_time" 
                        name="nome_time" 
                        class="form-input" 
                        placeholder="EX: VELOCISTAS AZUIS"
                        maxlength="50"
                        required
                    >
                    <div class="character-count" id="nome-count">0/50 caracteres</div>
                </div>
                
                <div class="form-group">
                    <label for="integrantes" class="form-label">👥 INTEGRANTES</label>
                    <textarea 
                        id="integrantes" 
                        name="integrantes" 
                        class="form-input" 
                        rows="4" 
                        placeholder="DIGITE OS NOMES SEPARADOS POR VÍRGULA&#10;EX: JOÃO, MARIA, PEDRO, ANA"
                        required
                    ></textarea>
                    <div class="character-count" id="integrantes-count">0 integrantes</div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-pixel btn-success">💾 SALVAR TIME</button>
                    <a href="{{ route('times.blade') }}" class="btn-pixel btn-secondary">↩️ VOLTAR</a>
                </div>
            </form>
        </div>

        @if($errors->any())
        <div class="error-card">
            <div class="pixel-decoration pixel-1"></div>
            <div class="pixel-decoration pixel-2"></div>
            <div class="pixel-decoration pixel-3"></div>
            <div class="pixel-decoration pixel-4"></div>
            
            <strong>⚠️ ERROS:</strong>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <script>
        // Contador de caracteres para o nome do time
        const nomeInput = document.getElementById('nome_time');
        const nomeCount = document.getElementById('nome-count');
        
        nomeInput.addEventListener('input', function() {
            const count = this.value.length;
            nomeCount.textContent = `${count}/50 caracteres`;
            
            if (count > 45) {
                nomeCount.style.color = '#ff6b6b';
            } else {
                nomeCount.style.color = '#d4b3ff';
            }
        });

        // Contador de integrantes
        const integrantesInput = document.getElementById('integrantes');
        const integrantesCount = document.getElementById('integrantes-count');
        
        integrantesInput.addEventListener('input', function() {
            const text = this.value.trim();
            const integrantes = text ? text.split(',').filter(name => name.trim() !== '') : [];
            const count = integrantes.length;
            
            integrantesCount.textContent = `${count} integrante${count !== 1 ? 's' : ''}`;
            
            if (count > 8) {
                integrantesCount.style.color = '#ff6b6b';
            } else {
                integrantesCount.style.color = '#d4b3ff';
            }
        });

        // Efeito pixelado nos inputs
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translate(2px, 2px)';
                this.style.boxShadow = '2px 2px 0 #5a2d91';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'translate(0, 0)';
                this.style.boxShadow = '4px 4px 0 #5a2d91';
            });
        });

        // Efeito de digitação nas instruções
        document.addEventListener('DOMContentLoaded', function() {
            const instructions = document.querySelector('.instructions');
            const originalHTML = instructions.innerHTML;
            instructions.innerHTML = '';
            
            let i = 0;
            const typeWriter = setInterval(() => {
                if (i < originalHTML.length) {
                    instructions.innerHTML += originalHTML.charAt(i);
                    i++;
                } else {
                    clearInterval(typeWriter);
                }
            }, 30);
        });
    </script>
</body>
</html>