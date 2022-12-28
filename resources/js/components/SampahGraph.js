import axios from 'axios';
import React, { useState, useEffect } from 'react';
import MingguanChart from './sampahChart/MingguanChart';
import BulananChart from './sampahChart/BulananChart';
import TahunanChart from './sampahChart/TahunanChart';

function SampahGraph() {
    const [option, setOption] = useState(0);
    const [category, setCategory] = useState("berat_sampah_total");
    const [month, setMonth] = useState(12);
    const [year, setYear] = useState(2022);
    const [post, setPost] = useState([]);

    React.useEffect(() => {
        // axios.post('/statistikMinggu', { category: category }).then((response) => {
        //     setPost(response.data);
        // });

        switch (option) {
            case 0:
                axios.post('/statistikMinggu', { category: category }).then((response) => {
                    setPost(response.data);
                });
                break;
            case 1:
                axios.post('/statistikBulan', { category: category, month: month }).then((response) => {
                    setPost(response.data);
                });
                break;
            case 2:
                axios.post('/statistikTahun', { category: category, year: year }).then((response) => {
                    setPost(response.data);
                });
                break;
        }

    }, [option, category, month]);

    const changeTime = (number) => {
        setOption(number);
        updateChart();
    };

    const changeCategory = (category) => {
        setCategory(category);
        updateChart();
    };

    const changeYear = (year) => {
        setYear(year);
        updateChart();
    };

    const changeMonth = (month) => {
        setMonth(month);
        updateChart();
    };


    const updateChart = () => {
        switch (option) {
            case 0:
                axios.post('/statistikMinggu', { category: category }).then((response) => {
                    setPost(response.data);
                });
                break;
            case 1:
                axios.post('/statistikBulan', { category: category, month: month }).then((response) => {
                    setPost(response.data);
                });
                break;
            case 2:
                axios.post('/statistikTahun', { category: category, year: year }).then((response) => {
                    setPost(response.data);
                });
                break;
        }
    };



    return (
        <div className="container">
            <div className="row justify-content-center mb-9">
                <h1 className=' text-xl md:text-2xl py-9 font-semibold ' >Selamat Datang di Grafik Sampah</h1>
                <div className=" h-screen bg-blue p-3 md:p-20 rounded-3xl" >
                    <div className="mb-3">
                        <button type="button" onClick={() => { changeTime(0) }} className={`${option == 0 ? ' bg-green-500 text-white' : ' border-green-500 text-green-500'} mr-1 inline-block px-6 py-2 border-2 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out`}>Mingguan</button>
                        <button type="button" onClick={() => { changeTime(1) }} className={`${option == 1 ? ' bg-green-500 text-white' : ' border-green-500 text-green-500'} mx-1 inline-block px-6 py-2 border-2 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out`}>Bulanan</button>
                        <button type="button" onClick={() => { changeTime(2) }} className={`${option == 2 ? ' bg-green-500 text-white' : ' border-green-500 text-green-500'} mx-1 inline-block px-6 py-2 border-2 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out`}>Tahunan</button>
                    </div>

                    {
                        option == 0 ?
                            <div class="my-2 text-sm">
                                <div class="mb-3 w-56 ">
                                    <select class="form-select appearance-none
                                                    block
                                                    w-full
                                                    px-3
                                                    py-1.5
                                                    font-normal
                                                    text-gray-700
                                                    bg-white bg-clip-padding bg-no-repeat
                                                    border border-solid border-gray-300
                                                    rounded
                                                    transition
                                                    ease-in-out
                                                    m-0
                                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        aria-label="Default select example"
                                        value={category}
                                        onChange={(e) => changeCategory(e.target.value)}>
                                        <option value="berat_sampah_total">Total Data Sampah</option>
                                        <option value="berat_sampah_plastik">Plastik</option>
                                        <option value="berat_sampah_logam">Logam</option>
                                        <option value="berat_sampah_kertas">Kertas</option>
                                        <option value="berat_sampah_kaca">Karet</option>
                                        <option value="berat_sampah_karet">Kaca</option>
                                        <option value="berat_sampah_organik">Organik</option>
                                        <option value="berat_sampah_anorganik">Anorganik</option>
                                        <option value="berat_sampah_lain_lain">lain-lain</option>
                                    </select>
                                </div>
                                <div >
                                    <MingguanChart props={post} />
                                </div>

                            </div>
                            : null
                    }
                    {
                        option == 1 ?
                            <div class="my-2 text-sm">
                                <div class=" flex justify-start">
                                    <div class="mb-3 w-56 ">
                                        <select class="form-select appearance-none
                                            block
                                            w-full
                                            px-3
                                            py-1.5
                                            font-normal
                                            text-gray-700
                                            bg-white bg-clip-padding bg-no-repeat
                                            border border-solid border-gray-300
                                            rounded
                                            transition
                                            ease-in-out
                                            m-0
                                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            aria-label="Default select example"
                                            value={category}
                                            onChange={(e) => changeCategory(e.target.value)}>
                                            <option value="berat_sampah_total">Total Data Sampah</option>
                                            <option value="berat_sampah_plastik">Plastik</option>
                                            <option value="berat_sampah_logam">Logam</option>
                                            <option value="berat_sampah_kertas">Kertas</option>
                                            <option value="berat_sampah_kaca">Karet</option>
                                            <option value="berat_sampah_karet">Kaca</option>
                                            <option value="berat_sampah_organik">Organik</option>
                                            <option value="berat_sampah_anorganik">Anorganik</option>
                                            <option value="berat_sampah_lain_lain">lain-lain</option>
                                        </select>
                                    </div>
                                    <div class="ml-3 mb-3 w-56 ">
                                        <select class="form-select appearance-none
                                            block
                                            w-full
                                            px-3
                                            py-1.5
                                            font-normal
                                            text-gray-700
                                            bg-white bg-clip-padding bg-no-repeat
                                            border border-solid border-gray-300
                                            rounded
                                            transition
                                            ease-in-out
                                            m-0
                                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            aria-label="bulanan"
                                            value={month}
                                            onChange={(e) => changeMonth(e.target.value)}>
                                            <option value="01">Januari</option>
                                            <option value="02">February</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="ml-3 mb-3 w-56 ">
                                        <select class="form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            aria-label="tahunan"
                                            value={year}
                                            onChange={(e) => changeYear(e.target.value)}>
                                            <option value="2022">2022</option>
                                        </select>
                                    </div>
                                </div>

                                <div >
                                    <BulananChart props={post} />
                                </div>

                            </div>
                            : null
                    }
                    {
                        option == 2 ?
                            <div class="my-2 text-sm">
                                <div class=" flex justify-start">
                                    <div class="mb-3 w-56 ">
                                        <select class="form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            aria-label="Default select example"
                                            value={category}
                                            onChange={(e) => changeCategory(e.target.value)}>
                                            <option value="berat_sampah_total">Total Data Sampah</option>
                                            <option value="berat_sampah_plastik">Plastik</option>
                                            <option value="berat_sampah_logam">Logam</option>
                                            <option value="berat_sampah_kertas">Kertas</option>
                                            <option value="berat_sampah_kaca">Karet</option>
                                            <option value="berat_sampah_karet">Kaca</option>
                                            <option value="berat_sampah_organik">Organik</option>
                                            <option value="berat_sampah_anorganik">Anorganik</option>
                                            <option value="berat_sampah_lain_lain">lain-lain</option>
                                        </select>
                                    </div>
                                    <div class="ml-3 mb-3 w-56 ">
                                        <select class="form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            aria-label="tahunan"
                                            value={year}
                                            onChange={(e) => changeYear(e.target.value)}>
                                            <option value="2022">2022</option>
                                        </select>
                                    </div>
                                </div>
                                <div >
                                    <TahunanChart props={post} />
                                </div>

                            </div>
                            : null
                    }
                </div>

            </div>
        </div>
    );
}

export default SampahGraph;