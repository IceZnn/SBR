<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Time - Corrida</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border: 4px solid #000;
            border-radius: 0;
            padding: 20px;
            box-shadow: 8px 8px 0 #000;
        }

        .pixel-title {
            font-size: 2.5em;
            text-align: center;
            color: #ff6b6b;
            text-shadow: 3px 3px 0 #000;
            margin-bottom: 30px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .form-card {
            background: #fff;
            border: 3px solid #000;
            border-radius: 0;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 4px 4px 0 #000;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #000;
            font-size: 1.1em;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 3px solid #000;
            border-radius: 0;
            font-family: 'Courier New', monospace;
            font-size: 1.1em;
            box-shadow: 4px 4px 0 #000;
            background: #fff;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 #000;
        }

        .btn-pixel {
            background: #ffd93d;
            border: 3px solid #000;
            border-radius: 0;
            padding: 12px 24px;
            font-family: 'Courier New', monospace;
            font-weight: bold;
            font-size: 1.1em;
            cursor: pointer;
            box-shadow: 4px 4px 0 #000;
            transition: all 0.2s;
            margin: 5px;
            text-decoration: none;
            color: #000;
            display: inline-block;
        }

        .btn-pixel:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 #000;
            color: #000;
            text-decoration: none;
        }

        .btn-success {
            background: #4ecdc4;
        }

        .btn-secondary {
            background: #95a5a6;
        }

        .instructions {
            background: #fffacd;
            border: 2px solid #000;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 0.9em;
        }

        .character-count {
            text-align: right;
            font-size: 0.8em;
            color: #666;
            margin-top: 5px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="pixel-title">➕ CRIAR TIME</h1>

        <div class="instructions">
            <strong>🎮 INSTRUÇÕES:</strong><br>
            • Digite o nome do time<br>
            • Liste os integrantes separados por VÍRGULA<br>
            • Exemplo: <em>João, Maria, Pedro, Ana</em>
        </div>

        <div class="form-card">
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
        <div class="form-card" style="background: #ff6b6b;">
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
                nomeCount.style.color = '#666';
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
                integrantesCount.style.color = '#666';
            }
        });

        // Efeito pixelado nos inputs
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translate(-2px, -2px)';
                this.style.boxShadow = '6px 6px 0 #000';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'translate(0, 0)';
                this.style.boxShadow = '4px 4px 0 #000';
            });
        });
    </script>
</body>
</html>