<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

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
        }

        .pixel-box {
            background-color: #2a1a3f;
            border: 4px solid #6c4eb6;
            padding: 2rem;
            image-rendering: pixelated;
        }

        input, button, a, label {
            font-family: 'Press Start 2P', monospace;
            font-size: 10px;
            image-rendering: pixelated;
        }

        input {
            border: 3px solid #6c4eb6;
            background-color: #1b1025;
            color: #d2b6ff;
            padding: 10px;
            width: 100%;
        }

        input:focus {
            outline: none;
            border-color: #8d6ae9;
            background-color: #261638;
        }

        button {
            background-color: #6c4eb6;
            border: 3px solid #1b1025;
            color: #f0e6ff;
            padding: 10px 16px;
            transition: 0.2s;
        }

        button:hover {
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

        .title {
            color: #c9a8ff;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 12px;
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <div class="flex justify-center items-center min-h-screen">
        <div class="pixel-box w-full max-w-md">
            <h1 class="title">🕹 LOGIN PIXELADO ROXO 🕹</h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-xs text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-xs" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>