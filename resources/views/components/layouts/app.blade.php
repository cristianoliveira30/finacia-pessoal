<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="icon" href="{{asset('assets/img/para.png')}}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('head')
    @stack('styles')
</head>
<body class="min-h-screen antialiased">
    <div class="min-h-dvh lg:flex dark:bg-gray-800 dark:text-gray-50">
        @include('components.layouts.app.sidebar')

        <div class="flex-1 min-w-0 flex flex-col">
            @include('components.layouts.app.header')

            <main class="flex-1 min-w-0">
                {{ $slot ?? '' }}
                @yield('content')
            </main>
            @include('components.layouts.app.footer')
        </div>
    </div>
    @stack('scripts')
</body>
</html>