@extends('layouts.nav')

@section('main')
    <h1 class="text-center font-semibold text-xl md:text-3xl py-9">FORM PELAPORAN SAMPAH</h1>
    <form method="POST" action="">
        <div class=" md:flex justify-center">
            <div class=" bg-blue-200 md:rounded-xl md:w-1/3 md:mr-16 mt-4">
                {{-- Grouping Input --}}
                <div class=" px-14">
                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Kertas
                        </p>
                        <input type="number" min="0" id="employeeEmail" value="{{ old('kertas') }}"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Kaca
                        </p>
                        <input type="number" min="0" id="employeeEmail"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Karet
                        </p>
                        <input type="number" min="0" id="employeeEmail"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Plastik
                        </p>
                        <input type="number" min="0" id="employeeEmail"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Logam
                        </p>
                        <input type="number" min="0" id="employeeEmail"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Lain-lain
                        </p>
                        <input type="number" min="0" id="employeeEmail"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>
                </div>
            </div>
            <div class=" bg-blue-200 md:rounded-xl md:w-1/3 h-max mt-4">
                {{-- Grouping Input --}}
                <div class=" px-14">
                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Sampah Organik
                        </p>
                        <input type="number" min="0" id="employeeEmail"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Sampah Diteruskan ke TPA
                        </p>
                        <input type="number" min="0" id="employeeEmail"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>
                </div>

            </div>

        </div>
        <div class='flex justify-center pb-3 pt-10'>
            <button type="submit"
                class="inline-block w-60 h-12 rounded-3xl bg-green-600 text-white font-medium text-xs leading-tight uppercase  shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                Tambah Sampah
            </button>

        </div>
    </form>
@endsection
