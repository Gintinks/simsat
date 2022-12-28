@section('page_title')
    {{ "Input Sampah" }}
@endsection
@extends('layouts.nav')

@section('main')
    <!--  success message-->
    

    @if ($message = session('success'))
        <div class=" flex justify-center">
            <div class="flex md:w-2/3 alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 items-center  alert-dismissible fade show"
                role="alert">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
                    class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                </svg>
                {{ $message }}
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif


    <h1 class="text-center font-semibold text-xl md:text-3xl py-9">FORM PELAPORAN SAMPAH</h1>
    <form action="sampahInput">
        <div class=" md:flex justify-center">
            <div class=" bg-blue-200 md:rounded-xl md:w-1/3 md:mr-16 mt-4">
                {{-- Grouping Input --}}
                <div class=" px-14">
                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Kertas
                        </p>
                        <input type="number" min="0" id="kertas" name="kertas"
                            placeholder="Kosongkan jika tidak ada"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Kaca
                        </p>
                        <input type="number" min="0" id="kaca" name="kaca"
                            placeholder="Kosongkan jika tidak ada"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Karet
                        </p>
                        <input type="number" min="0" id="karet" name="karet"
                            placeholder="Kosongkan jika tidak ada"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Plastik
                        </p>
                        <input type="number" min="0" id="plastik" name="plastik"
                            placeholder="Kosongkan jika tidak ada"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Logam
                        </p>
                        <input type="number" min="0" id="logam" name="logam"
                            placeholder="Kosongkan jika tidak ada"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Lain-lain
                        </p>
                        <input type="number" min="0" id="lain_lain" name="lain_lain"
                            placeholder="Kosongkan jika tidak ada"
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
                        <input type="number" min="0" id="sampah_organik" name="sampah_organik"
                            placeholder="Kosongkan jika tidak ada"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>

                    <div class='my-2 py-3'>
                        <p class=" font-semibold">
                            Sampah Diteruskan ke TPA
                        </p>
                        <input type="number" min="0" id="diteruskan_ke_tpa" name="diteruskan_ke_tpa"
                            placeholder="Kosongkan jika tidak ada"
                            class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    </div>
                </div>

            </div>

        </div>
        <div class='flex justify-center pb-3 pt-10'>
            <button type="submit" value="submit"
                class="inline-block w-60 h-12 rounded-3xl bg-green-600 text-white font-medium text-xs leading-tight uppercase  shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                Tambah Sampah
            </button>

        </div>
    </form>
@endsection
