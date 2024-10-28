<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                    <input id="password" type="password" name="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full p-2 bg-blue-600 text-white rounded-md">Войти</button>
            </form>
        </div>
    </div>
</body>
</html>