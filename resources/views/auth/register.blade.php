@section('page_title')
    {{ "Admin" }}
@endsection
@extends('layouts.nav')

@section('main')
    <div class="md:flex md:justify-between py-6 flex-row-reverse">
        <div>
            <div class="dropdown relative mb-2">
                <button
                    class="flex text-xl bg-white hover:bg-green-500 hover:text-white focus:text-white focus:bg-green-500  border-green-500 text-green-500 px-6 py-2 border-2 font-medium leading-tight rounded focus:ring-0 transition duration-150 ease-in-out"
                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
                    <span class="iconify h-6 w-6 ml-2" data-icon="bxs:user"></span>
                </button>
                <ul class="
                             w-40
                            dropdown-menu
                            min-w-max
                            absolute
                            hidden
                            bg-white
                            text-base
                            z-50
                            float-left
                            py-2
                            list-none
                            text-left
                            rounded-lg
                            shadow-lg
                            mt-1
                            m-0
                            bg-clip-padding
                            border-none
                        "
                    aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="
                                dropdown-item
                                text-sm
                                py-2
                                px-4
                                font-normal
                                block
                                w-full
                                whitespace-nowrap
                                bg-transparent
                                text-gray-700
                                hover:bg-gray-100
                                "
                            href="/logout">Log out</a>
                    </li>
                </ul>
            </div>
        </div>

        <header>
            <h2 class="text-2xl font-bold">DASHBOARD ADMIN</h2>
        </header>

    </div>
    <div class="" id="employeeeApp">
    </div>
@endsection
