<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

        <main class=" pt-24 md:col-span-6">
            <div class="md:rounded-2xl mx-14" style="background: #EEFBF4">
                <div class=" px-16">
                    <div class="flex">
                            <div class="flex justify-center">
                                <div class="mb-3 xl:w-96">
                                    <select
                                        class="custom-select appearance-none
                                        
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        aria-label="Default select example" >
                                        <option selected>Default</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    
                                </div>
                            </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    #
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    First
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Last
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Handle
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-gray-100 border-b">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    1</td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    Mark
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    Otto
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr class="bg-white border-b">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    2</td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    Jacob
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    Thornton
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-100 border-b">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    3</td>
                                                <td colspan="2"
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                    Larry the Bird
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @twitter
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</body>

</html>
