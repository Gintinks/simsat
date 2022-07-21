import axios from 'axios';
import React, { useState, useEffect } from 'react';
import { toast } from 'react-toastify';


const FilterSampah = (props) => {

    const dataCategory = [
        {
            "id": 1,
            "category": "Kertas",
            "checked": false
        },
        {
            "id": 2,
            "category": "Kaca",
            "checked": false
        },
        {
            "id": 3,
            "category": "Karet",
            "checked": false
        },
        {
            "id": 4,
            "category": "Logam",
            "checked": false
        },
        {
            "id": 5,
            "category": "Plastik",
            "checked": false
        },
        {
            "id": 6,
            "category": "Lain-lain",
            "checked": false
        },
        {
            "id": 7,
            "category": "Organik",
            "checked": false
        }

    ]

    const dataTps = () => []

    const dataRange = () => [
        {
            "id": 1,
            "category": "7 Hari Terakhir",
            "checked": false
        },
        {
            "id": 2,
            "category": "30 Hari Terakhir",
            "checked": false
        },

    ]
    const [priviliges, setPriviliges] = useState("");
    const [tps, setTps] = useState([]);
    React.useEffect(() => {
        axios.get('/get-priviliges').then((response) => {
            setPriviliges(response.data);
        });
        axios.get('/list-tps').then((response) => {
            setTps(response.data);
        });
        tps.map((value) => {
            return updateCheckedTps(value.id, 'checked', !value.checked)
        })
    }, []);
    const [category, setCategory] = useState(dataCategory);
    const [range, setRange] = useState(dataRange);




    const updateChecked = (id, whichvalue, newvalue) => {
        var index = category.findIndex(x => x.id === id);

        let g = category[index]
        g[whichvalue] = newvalue

        setCategory([
            ...category.slice(0, index),
            g,
            ...category.slice(index + 1)
        ]
        );
        /*
        the first input of the function is the id of the item
        the second input of the function is the atrribute that you wish to change
        the third input of the function is the new value for that attribute
        It's a pleasure :0
        ~atlas
        */
    }
    const updateCheckedTps = (id, whichvalue, newvalue) => {
        var index = tps.findIndex(x => x.id === id);

        let g = tps[index]
        g[whichvalue] = newvalue

        setTps([
            ...tps.slice(0, index),
            g,
            ...tps.slice(index + 1)
        ]
        );
    }

    const updateRange = (id, whichvalue, newvalue) => {
        var index = range.findIndex(x => x.id === id);

        let g = range[index]
        g[whichvalue] = newvalue

        setRange([
            ...range.slice(0, index),
            g,
            ...range.slice(index + 1)
        ]
        );
        if (id === 1 && newvalue) {
            updateRange(2, 'checked', false)
        } else if (id === 2 && newvalue) {
            updateRange(1, 'checked', false)
        }
    }

    const displayCategories = category.map((value, index) => {
        return (
            <button type="button" onClick={() => { updateChecked(value.id, 'checked', !value.checked) }} className={`${value.checked ? '  bg-yellow-500 text-white hover:bg-yellow-400' : ' border-yellow-500 text-yellow-500 hover:bg-gray-100'} m-1 inline-block px-6 py-2 border-2 font-medium text-xs leading-tight uppercase rounded focus:outline-none focus:ring-0 transition duration-150 ease-in-out`}>{value.category}</button>
        );
    })
    const displayTPS = tps.map((value, index) => {
        return (
            <button type="button" onClick={() => { updateCheckedTps(value.id, 'checked', !value.checked) }} className={`${value.checked ? '  bg-green-500 text-white hover:bg-green-400' : ' border-green-500 text-green-500 hover:bg-gray-100'} m-1 inline-block px-6 py-2 border-2 font-medium text-xs leading-tight uppercase rounded focus:outline-none focus:ring-0 transition duration-150 ease-in-out`}>{value.name}</button>
        );
    })
    const displayRange = range.map((value, index) => {
        return (
            <button type="button" onClick={() => { updateRange(value.id, 'checked', !value.checked) }} className={`${value.checked ? '  bg-blue-500 text-white hover:bg-blue-400' : ' border-blue-500 text-blue-500 hover:bg-gray-100'} m-1 inline-block px-6 py-2 border-2 font-medium text-xs leading-tight uppercase rounded focus:outline-none focus:ring-0 transition duration-150 ease-in-out`}>{value.category}</button>
        );
    })

    const handleFilter = () => {
        axios.post('/sampah-filter', { category: category, tps: tps, range: range }).then((response) => {
            // const dataFilter = response.data.filter((curData) => {
            //     return curData.berat_sampah_karet === 0
            // })
            props.filterData(response.data)
        });

    }

    // const handleCSV = () => {
    //     axios.post('/sampah-export').then((response) => {
            
    //     });

    // }

    return (
        <div>
            <div className='flex justify-between  pb-3'>
                <button type="button" className="flex justify-between px-10 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter">
                    Filter
                    <span class="iconify ml-1 h-4 w-4" data-icon="charm:filter"></span>
                </button>

                {/* <button type="button" className="flex p-1 px-6 justify-between rounded self-center bg-green-600 text-white font-medium leading-tight shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none hover:scale-110 focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                onClick={() => { handleCSV() }}>
                    <span class="iconify mr-1 h-5 w-5" data-icon="ant-design:file-excel-filled"></span>
                    Print CSV
                </button> */}
            </div>


            <div className="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                <div className="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                    <div className="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <div className="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                            <h5 className="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                                Filter
                            </h5>
                            <button type="button"
                                className="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div className="modal-body relative p-4 mx-3">
                            <div className=' border-b-2 border-gray-200 py-3'>
                                <p className=' font-semibold text-lg'>
                                    priviliges
                                </p>
                                {displayCategories}
                            </div>
                            {priviliges == "2" ? <div className=' border-b-2 border-gray-200 py-3'>
                                <p className=' font-semibold text-lg'>
                                    Desa
                                </p>
                                {displayTPS}
                            </div> : null}


                            <div className=' border-b-2 border-gray-200 py-3'>
                                <p className=' font-semibold text-lg'>
                                    Rentang
                                </p>
                                {displayRange}
                            </div>

                        </div>
                        <div
                            className="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                            <button type="button"
                                className="inline-block px-6 py-2.5 bg-gray-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out"
                                data-bs-dismiss="modal">
                                Tutup
                            </button>
                            <button type="button"
                                value="Save"
                                data-bs-dismiss="modal"
                                onClick={() => { handleFilter() }}
                                class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    );
}

export default FilterSampah;