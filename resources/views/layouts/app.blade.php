<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="bg-gray-200 min-h-screen leading-none">

    @if (session('estado'))
        <div class="bg-teal-500 p-8 text-center text-white font-bold uppercase">
            {{ session('estado') }}
        </div>
    @endif

    <div id="app">
        <nav class="bg-gray-800 shadow-md py-6">
            <div class="container mx-auto md:px-0">
                <div class="flex text-center justify-around">
                    <a class="text-3xl text-white" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <nav class="flex-2 text-right mt-2">
                        <!-- Authentication Links -->
                        @guest
                            <a class="text-white no-underline hover:underline hover:text-gray-300 p-3 mt-1 text-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                    <a class="text-white no-underline hover:underline hover:text-gray-300 p-3 mt-1 text-sm" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else

                            <a href="{{ route('notificaciones') }}"
                               class="text-xs font-semibold inline-block py-1 px-2 text-white rounded-full bg-teal-600 uppercase last:mr-0 mr-1">
                                {{ Auth::user()->unreadNotifications->count() }}
                            </a>


                            <span class="text-gray-300 text-sm pr-4 d-block">{{ Auth::user()->name }}</span>

                            <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </nav>
                </div>
            </div>
        </nav>

        <div class="bg-gray-700">
            <nav class="container mx-auto flex space-x-1">
                @yield('navegacion')
            </nav>
        </div>

        <main class="mt-10 container mx-auto px-8">
            @yield('content')
        </main>
    </div>

    @yield('scripts')

</body>

</html>
