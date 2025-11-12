<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Race</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        /* === Estilo Pixelado Roxo (sem neon) === */
        body {
            background-color: #1b1025;
            background-image:
                linear-gradient(45deg, #231134 25%, transparent 25%),
                linear-gradient(-45deg, #231134 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, #231134 75%),
                linear-gradient(-45deg, transparent 75%, #231134 75%);
            background-size: 20px 20px;
            font-family: 'Press Start 2P', monospace;
            color: #d2b6ff;
            image-rendering: pixelated;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pixel-box {
            background-color: #2a1a3f;
            border: 4px solid #6c4eb6;
            padding: 2rem;
            image-rendering: pixelated;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .title {
            color: #c9a8ff;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 12px;
        }

        input, button, a, label {
            font-family: 'Press Start 2P', monospace;
            font-size: 10px;
            image-rendering: pixelated;
        }

        .input-label {
            color: #d2b6ff;
            margin-bottom: 0.5rem;
            display: block;
        }

        .text-input {
            border: 3px solid #6c4eb6;
            background-color: #1b1025;
            color: #d2b6ff;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .text-input:focus {
            outline: none;
            border-color: #8d6ae9;
            background-color: #261638;
        }

        .primary-button {
            background-color: #6c4eb6;
            border: 3px solid #1b1025;
            color: #f0e6ff;
            padding: 10px 16px;
            transition: 0.2s;
            cursor: pointer;
            font-family: 'Press Start 2P', monospace;
            font-size: 10px;
        }

        .primary-button:hover {
            background-color: #8d6ae9;
            border-color: #2a1a3f;
        }

        a {
            color: #b999ff;
            text-decoration: underline;
        }

        a:hover {
            color: #d2b6ff;
        }

        .input-error {
            color: #ff6b6b;
            font-size: 8px;
            margin-top: 0.5rem;
        }

        .auth-session-status {
            margin-bottom: 1rem;
            padding: 10px;
            background-color: #1b1025;
            border: 2px solid #6c4eb6;
            color: #d2b6ff;
            font-size: 8px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .flex {
            display: flex;
        }

        .justify-center {
            justify-content: center;
        }

        .items-center {
            align-items: center;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .w-full {
            width: 100%;
        }

        .max-w-md {
            max-width: 400px;
        }

        .block {
            display: block;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .ms-2 {
            margin-left: 0.5rem;
        }

        .ms-3 {
            margin-left: 0.75rem;
        }

        .inline-flex {
            display: inline-flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .text-xs {
            font-size: 8px;
        }

        .text-gray-400 {
            color: #a0a0a0;
        }

        /* Estilo para checkbox personalizado */
        input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            background-color: #1b1025;
            border: 2px solid #6c4eb6;
            position: relative;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            background-color: #6c4eb6;
        }

        input[type="checkbox"]:checked::after {
            content: "✓";
            color: #f0e6ff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="flex justify-center items-center min-h-screen">
        <div class="pixel-box w-full max-w-md">
            <h1 class="title">LOGIN PIXEL RACE</h1>

            <!-- Session Status -->
            <x-auth-session-status class="auth-session-status mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" class="input-label" />
                    <x-text-input id="email" class="text-input block mt-1 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="input-error mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group mt-4">
                    <x-input-label for="password" :value="__('Password')" class="input-label" />
                    <x-text-input id="password" class="text-input block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="input-error mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-xs text-gray-400">{{ __('Lembrar de mim') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-xs" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="primary-button ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
