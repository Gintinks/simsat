@extends('layouts.nav')

@section('main')
    <div class="md:flex md:justify-between py-6 flex-row-reverse">
        <div>
            <div class="dropdown relative mb-2">
                <button
                    class="flex text-lg hover:bg-green-500 hover:text-white focus:text-white focus:bg-green-500  border-green-500 text-green-500 px-6 py-2 border-2 font-medium leading-tight rounded focus:ring-0 transition duration-150 ease-in-out"
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
        @if (auth()->user()->priviliges_id == 3)
            <header>
                <h2 class="text-2xl font-bold">DASHBOARD  {{ auth()->user()->tps }}</h2>
            </header>
        @else
        <header>
            <h2 class="text-2xl font-bold">DASHBOARD  MANAJEMEN DLH</h2>
        </header>
        @endif
    </div>

    <div class="grid md:grid-cols-4 gap-12 pb-8">

        <div class="shadow-md flex border-b-4 border border-green-400 justify-between rounded-t-lg bg-white">
            <span class="iconify w-16 h-16 self-center"
                style="color: #17cf67;"data-icon="material-symbols:assistant"></span>
            <div class="p-3">
                <p class=" text-2xl font-semibold">182 KG</p>
                <p>Total Sampah</p>
            </div>
        </div>

        <div class="shadow-md flex border-b-4 border border-green-400 justify-between rounded-t-lg bg-white">
            <span class="iconify w-16 h-16 self-center" data-icon="mdi:leaf-off" style="color: #17cf67;"></span>
            <div class="p-3">
                <p class=" text-2xl font-semibold">182 KG</p>
                <p>Organik</p>
            </div>
        </div>

        <div class="shadow-md flex border-b-4 border border-green-400 justify-between rounded-t-lg bg-white">
            <span class="iconify w-16 h-16 self-center" style="color: #17cf67;"data-icon="mdi:leaf"></span>
            <div class="p-3">
                <p class=" text-2xl font-semibold">182 KG</p>
                <p>Anorganik</p>
            </div>
        </div>

        <div class="shadow-md flex border-b-4 border border-green-400 justify-between rounded-t-lg bg-white">
            <span class="iconify w-16 h-16 self-center opacity-75" data-icon="tabler:recycle-off"
                style="color: #17cf67;"></span>
            <div class="p-3">
                <p class=" text-2xl font-semibold">182 KG</p>
                <p>Tidak Terolah</p>
            </div>
        </div>

    </div>
    <h2 class="text-xl font-bold">DATA MINGGUAN</h2>
    <div class="grid md:grid-cols-2 gap-12 pb-5">
        <div class="shadow-lg rounded-lg overflow-hidden bg-white">
            <div class="py-3 px-5 bg-gray-50">Line chart</div>
            <canvas class="p-10" id="chartLine"></canvas>
        </div>
        <div class="shadow-lg rounded-lg overflow-hidden bg-white">
            <div class="py-3 px-5 bg-gray-50">Bar chart</div>
            <canvas class="p-10" id="chartBar"></canvas>
        </div>
    </div>


    <div class="bg-bro bg-white rounded-2xl mb-3">
        <div class="p-6 md:w-2/6">
            <h2 class="text-xl font-bold ">Update Data</h2>
            <div class="">
                <div class=" border-b-2 border-gray-400">
                    <p class=" pb-1 text-gray-400 text-base">12 Juni 2022, 09:00</p>
                    <p class="pb-1">TPS3R Desa Punten menambahkan 28 Kg Sampah Organik</p>
                </div>

                <div class=" border-b-2 border-gray-400">
                    <p class=" pb-1 text-gray-400 text-base">12 Juni 2022, 09:00</p>
                    <p class="pb-1">TPS3R Desa Punten menambahkan 28 Kg Sampah Organik</p>
                </div>

                <div class=" border-b-2 border-gray-400">
                    <p class=" pb-1 text-gray-400 text-base">12 Juni 2022, 09:00</p>
                    <p class="pb-1">TPS3R Desa Punten menambahkan 28 Kg Sampah Organik</p>
                </div>
            </div>

        </div>

        <img src="{{ asset('img/bro.png') }}" class="md:hidden">


    </div>


    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart line -->
    <script>
        const labels = ["January", "February", "March", "April", "May", "June"];
        const data = {
            labels: labels,
            datasets: [{
                label: "My First dataset",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [0, 10, 5, 2, 20, 30, 45],
            }, ],

        };

        const configLineChart = {
            type: "line",
            data,
            options: {},
        };

        var chartLine = new Chart(
            document.getElementById("chartLine"),
            configLineChart
        );
    </script>

    <script>
        const labelsBarChart = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
        ];
        const dataBarChart = {
            labels: labelsBarChart,
            datasets: [{
                label: "My First dataset",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [0, 10, 5, 2, 20, 30, 45],
            }, ],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(
            document.getElementById("chartBar"),
            configBarChart
        );
    </script>
@endsection
