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
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS only -->
    @yield('css')
</head>

<body class=" text-black font-serif">
    <div class="grid md:grid-cols-7" id="app">
        @yield('body')

    </div>
    @yield('script')
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
</body>

{{-- </html>

<!doctype html>
<html>

<head>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class=" text-black font-serif">
    <div class="grid md:grid-cols-7">
        <div class=" md:col-span-1 md:h-screen md:sticky md:top-0" style="background: #00923F;">
            <nav class=" text-white ">
                <div class="hidden md:flex justify-center pt-7 pb-16">
                    <img src="{{ asset('img/batu.png') }}" alt="" class=" w-28 h-34">
                </div>

                <h1 class="text-2xl font-bold  ml-3 pb-3 text-center md:text-left">
                    <a href="">Master Data</a>
                </h1>

                <div class=" mx-10 text-lg">
                    <p
                        class="py-2 my-2 md:my-0 bg-orange-300 md:bg-transparent hover:bg-slate-300 rounded transition duration-300 ease-in-out">
                        <a href="" class="flex justify-center md:justify-start md:pl-3 ">
                            <span class="iconify h-6 w-6 mr-3" data-icon="bx:home-alt"></span>
                            <span>Dashboard</span>
                        </a>
                    </p>
                    <p
                        class="py-2 my-2 md:my-0 bg-black md:bg-transparent hover:bg-slate-500 rounded transition duration-300 ease-in-out">
                        <a href="" class="flex justify-center md:justify-start md:pl-3">
                            <span class="iconify h-6 w-6 mr-3" data-icon="fa6-solid:trash-can-arrow-up"></span>
                            <span>Input Sampah</span>
                        </a>
                    </p>
                    <p class=" py-2 hover:bg-slate-500 rounded transition duration-300 ease-in-out">
                        <a href="" class="flex  pl-3">
                            <span class="iconify h-6 w-6 mr-3" data-icon="carbon:report"></span>
                            <span>Laporan</span>
                        </a>
                    </p>
                    <p class=" py-2 hover:bg-slate-500 rounded transition duration-300 ease-in-out">
                        <a href="" class="flex  pl-3">
                            <span class="iconify h-6 w-6 mr-3" data-icon="akar-icons:statistic-up"></span>
                            <span>Statistik</span>
                        </a>
                    </p>
                </div>
            </nav>
        </div>

        <main class="px-16 md:col-span-6" id="app">
            @yield('body')
        </main>
    </div>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html> --}}
