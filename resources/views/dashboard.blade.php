<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class=" text-black font-serif">
    <div class="grid md:grid-cols-7">
        <div class=" md:col-span-1 sticky" style="background: #17cf67;">
            <nav class=" text-white ">
                <div class="flex justify-center pt-7 pb-16">
                    <img src="{{ asset('img/batu.png') }}" alt="" class=" w-28 h-34">
                </div>

                <h1 class="text-2xl font-bold  ml-3 pb-3">
                    <a href="">Master Data</a>
                </h1>

                <div class=" mx-10 text-left text-lg">
                    <p class="py-2 hover:bg-slate-500 rounded transition duration-300 ease-in-out">
                        <a href="" class="flex pl-3">
                            <span class="iconify h-6 w-6 mr-3" data-icon="bx:home-alt"></span>
                            <span>Dashboard</span>
                        </a>
                    </p>
                    <p class=" py-2 hover:bg-slate-500 rounded transition duration-300 ease-in-out">
                        <a href="" class="flex pl-3">
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

            <div class="md:flex md:justify-between py-6">
                <header>
                    <h2 class="text-2xl font-bold">DASHBOARD TPSR3</h2>
                </header>
                <a href="">Log out</a>
            </div>

            <div class="grid md:grid-cols-4 gap-12 pb-8">

                <div class="shadow-md flex border-b-4 border border-green-400 justify-between rounded-t-lg ">
                    <span class="iconify w-16 h-16 self-center"
                        style="color: #17cf67;"data-icon="material-symbols:assistant"></span>
                    <div class="p-3">
                        <p class=" text-2xl font-semibold">182 KG</p>
                        <p>Total Sampah</p>
                    </div>
                </div>

                <div class="shadow-md flex border-b-4 border border-green-400 justify-between rounded-t-lg ">
                    <span class="iconify w-16 h-16 self-center" data-icon="mdi:leaf-off" style="color: #17cf67;"></span>
                    <div class="p-3">
                        <p class=" text-2xl font-semibold">182 KG</p>
                        <p>Organik</p>
                    </div>
                </div>

                <div class="shadow-md flex border-b-4 border border-green-400 justify-between rounded-t-lg ">
                    <span class="iconify w-16 h-16 self-center" style="color: #17cf67;"data-icon="mdi:leaf"></span>
                    <div class="p-3">
                        <p class=" text-2xl font-semibold">182 KG</p>
                        <p>Anorganik</p>
                    </div>
                </div>

                <div class="shadow-md flex border-b-4 border border-green-400 justify-between rounded-t-lg ">
                    <span class="iconify w-16 h-16 self-center" data-icon="tabler:recycle-off"
                        style="color: #17cf67;"></span>
                    <div class="p-3">
                        <p class=" text-2xl font-semibold">182 KG</p>
                        <p>Tidak Terolah</p>
                    </div>
                </div>

            </div>
            <h2 class="text-xl font-bold">DATA MINGGUAN</h2>
            <div class="grid md:grid-cols-2 gap-12 pb-5">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">Line chart</div>
                    <canvas class="p-10" id="chartLine"></canvas>
                </div>
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">Bar chart</div>
                    <canvas class="p-10" id="chartBar"></canvas>
                </div>
            </div>


            <h2 class="text-xl font-bold">HISTORY UPDATE DATA</h2>

            <div class="shadow-md border border-gray-700 rounded-t-lg mb-4">
                <div class="flex border border-b-2 border-gray-700 hover:bg-slate-200 transition duration-150 ease-in-out">
                    <span class=" iconify w-12 h-12 self-center min-w-[48px]" data-icon="eva:checkmark-circle-2-fill"></span>
                    <div class="p-3">
                        <p class=" text-lg  font-semibold">EDIT DATA : <span class="font-normal">Management DLH mengedit
                                data TPSR3 pada input sampah tanggal 10 Juni 2022, 09:00</span></p>
                        <p class=" text-blue-400 text-base">12 Juni 2022, 09:00</p>
                    </div>
                </div>
                <div class="flex border border-b-2 border-gray-700 ">
                    <span class="iconify w-12 h-12 self-center min-w-[48px]" data-icon="eva:checkmark-circle-2-fill"></span>
                    <div class="p-3">
                        <p class=" text-lg  font-semibold">TAMBAH DATA : <span class="font-normal">TPS3R Desa Punten menambahkan 4 Kg Sampah Kertas</span></p>
                        <p class=" text-blue-400 text-base">12 Juni 2022, 09:00</p>
                    </div>
                </div>
                <div class="flex border border-b-2 border-gray-700 ">
                    <span class="iconify w-12 h-12 self-center min-w-[48px]" data-icon="eva:checkmark-circle-2-fill"></span>
                    <div class="p-3">
                        <p class=" text-lg  font-semibold">EDIT DATA : <span class="font-normal">Management DLH mengedit
                                data TPSR3 pada input sampah tanggal 10 Juni 2022, 09:00</span></p>
                        <p class=" text-blue-400 text-base">12 Juni 2022, 09:00</p>
                    </div>
                </div>
                <div class="flex border border-b-2 border-gray-700 ">
                    <span class="iconify w-12 h-12 self-center min-w-[48px]" data-icon="eva:checkmark-circle-2-fill"></span>
                    <div class="p-3">
                        <p class=" text-lg  font-semibold">TAMBAH DATA : <span class="font-normal">TPS3R Desa Punten menambahkan 4 Kg Sampah Kertas</span></p>
                        <p class=" text-blue-400 text-base">12 Juni 2022, 09:00</p>
                    </div>
                </div>
            </div>


        </main>
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
</body>

</html>