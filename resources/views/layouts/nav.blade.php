@extends('layouts.app')
@section('body')
    <div class=" md:col-span-1 md:h-screen md:sticky md:top-0 shadow-xl" style="background: #00923F;">
        <nav class=" text-white ">
            <div class="hidden md:flex  justify-center pt-7 pb-16 align-middle">
                <img src="{{ asset('img/batu.png') }}" alt="" class=" w-1/2">
            </div>

            <h1 class="md:hidden text-2xl font-bold  ml-3 p-3 text-left flex justify-between items-center">
                <a href="">Master Data</a>
                <div id="clicker">
                    <span class="iconify cursor-pointer md:hidden h-8 w-8" data-icon="carbon:menu"
                        style="color: white;"></span>
                </div>
            </h1>

            <div class=" mx-10 md:mx-0 py-4 text-lg hidden md:block" id="menu">
                @if (auth()->user()->priviliges_id == 1)
                    <p
                        class="py-2 my-2 md:my-8  {{ 'register' == request()->path() ? 'bg-yellow-300' : '' }} md:bg-transparent  rounded transition duration-300 ease-in-out">
                        <a href="/register" class="flex  justify-center md:pl-3">
                            <span
                                class="iconify h-10 w-10 mr-3 {{ 'register' == request()->path() ? 'md:text-yellow-300' : '' }} hover:text-yellow-400"
                                data-icon="clarity:administrator-solid"></span>
                            <span class="md:hidden text-2xl self-center">Statistik</span>
                        </a>
                    </p>
                @endif
                @if (auth()->user()->priviliges_id == 3 || auth()->user()->priviliges_id == 2)
                    <p
                        class="py-2 my-2 md:my-8  {{ 'dashboard' == request()->path() ? 'bg-yellow-300' : '' }} md:bg-transparent rounded transition duration-300 ease-in-out">
                        <a href="/dashboard" class="flex justify-center md:pl-3 ">
                            <span
                                class="iconify h-12 w-12 mr-3 {{ 'dashboard' == request()->path() ? 'md:text-yellow-300' : '' }} hover:text-yellow-400"
                                data-icon="ic:baseline-space-dashboard"></span>
                            <span class="md:hidden text-2xl self-center">Dashboard</span>
                        </a>
                    </p>
                    @if (auth()->user()->priviliges_id == 3)
                        <p
                            class="py-2 my-2 md:my-8  {{ 'inputtps' == request()->path() ? 'bg-yellow-300' : '' }} md:bg-transparent  rounded transition duration-300 ease-in-out">
                            <a href="/inputtps" class="flex justify-center  md:pl-3">
                                <span
                                    class="iconify h-10 w-10 mr-3 {{ 'inputtps' == request()->path() ? 'md:text-yellow-300' : '' }} hover:text-yellow-400"
                                    data-icon="fa6-solid:trash-can-arrow-up"></span>
                                <span class="md:hidden text-2xl self-center">Input Sampah</span>
                            </a>
                        </p>
                    @endif
                    <p
                        class="py-2 my-2 md:my-8  {{ 'sampah-list' == request()->path() ? 'bg-yellow-300' : '' }} md:bg-transparent  rounded transition duration-300 ease-in-out">
                        <a href="/sampah-list" class="flex  justify-center  md:pl-3">
                            <span
                                class="iconify h-10 w-10 mr-3 {{ 'sampah-list' == request()->path() ? 'md:text-yellow-300' : '' }} hover:text-yellow-400"
                                data-icon="carbon:report"></span>
                            <span class="md:hidden text-2xl self-center">Laporan</span>
                        </a>
                    </p>
                    @if (auth()->user()->priviliges_id == 2)
                        <p
                            class="py-2 my-2 md:my-8  {{ 'statistik' == request()->path() ? 'bg-yellow-300' : '' }} md:bg-transparent  rounded transition duration-300 ease-in-out">
                            <a href="/statistik" class="flex  justify-center md:pl-3">
                                <span
                                    class="iconify h-10 w-10 mr-3 {{ 'statistik' == request()->path() ? 'md:text-yellow-300' : '' }} hover:text-yellow-400"
                                    data-icon="akar-icons:statistic-up"></span>
                                <span class="md:hidden text-2xl self-center">Statistik</span>
                            </a>
                        </p>
                    @endif
                @endif
            </div>
        </nav>
    </div>

    <main class=" px-4 md:px-16 md:col-span-11 bg-slate-100">
        @yield('main')
    </main>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
@endsection
