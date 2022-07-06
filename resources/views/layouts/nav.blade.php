@extends('layouts.app')
@section('body')
    <div class=" md:col-span-1 md:h-screen md:sticky md:top-0" style="background: #00923F;">
        <nav class=" text-white ">
            <div class="hidden md:flex justify-center pt-7 pb-16">
                <img src="{{ asset('img/batu.png') }}" alt="" class=" w-28 h-34">
            </div>

            <h1 class="text-2xl font-bold  ml-3 p-3 text-left flex justify-between items-center">
                <a href="">Master Data</a>
                <div id="clicker">
                <span class="iconify cursor-pointer md:hidden h-8 w-8" data-icon="carbon:menu"
                    style="color: white;"></span>
                </div>
            </h1>

            <div class=" mx-10 py-4 text-lg hidden md:block" id="menu">
                <p
                    class="py-2 my-2 md:my-0 bg-orange-300 md:bg-transparent hover:bg-slate-300 rounded transition duration-300 ease-in-out">
                    <a href="" class="flex justify-center md:justify-start md:pl-3 ">
                        <span class="iconify h-6 w-6 mr-3 " data-icon="bx:home-alt"></span>
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

    <main class="px-16 md:col-span-6">
        @yield('main')
    </main>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
@endsection
