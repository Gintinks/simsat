import axios from 'axios';
import React, { useState, useEffect } from 'react';
import { toast } from 'react-toastify';



const DeleteModal = ({ eachRowId }) => {
    const [priviliges, setPriviliges] = useState("");
    const [update, setUpdate] = useState({
        id: eachRowId.id,
        kertas: eachRowId.berat_sampah_kertas,
        kaca: eachRowId.berat_sampah_kaca,
        karet: eachRowId.berat_sampah_karet,
        plastik: eachRowId.berat_sampah_plastik,
        logam: eachRowId.berat_sampah_logam,
        lain_lain: eachRowId.berat_sampah_lain_lain,
        sampah_organik: eachRowId.berat_sampah_organik,
        diteruskan_ke_tpa: eachRowId.berat_sampah_ke_tpa,
    })
    React.useEffect(() => {
        axios.get('/get-priviliges').then((response) => {
            setPriviliges(response.data);
        });
        
    }, []);
    const current = new Date();
    const date = `${current.getFullYear()}-${current.getMonth()+1}-${current.getDate()}`;

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setUpdate({
            ...update,
            [name]: parseInt(value),
        });
    };
    
    const updateData = () => {
        if (priviliges == "3" && eachRowId.created_at.split('T')[0] != date) {
            toast.warning("Data sampah yang dapat diganti hanyalah data untuk hari ini");
        }
        else {
            axios.post('/update-sampah', update)
            .then(() => {
                toast.success("Data Sampah Berhasil Diupdate");

                setTimeout(() => {
                    location.reload();
                }, 2500)
            })
        }
    }


    return (
        <div className="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id={"updateModal" + eachRowId.id} tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
            <div className="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                <div className="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    <div className="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                        <h5 className="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                            Update Data Sampah
                        </h5>
                        <button type="button"
                            className="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body relative p-4 mx-3">
                        <form className=''>
                            <div className='my-2 flex'>
                                <p className=' self-center text-left mr-3 font-medium basis-28'>
                                    Kertas:
                                </p>

                                <input type="number"
                                    min="0"
                                    id="eachRowKertas"
                                    className='px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                    name="kertas"
                                    value={update.kertas}
                                    onChange={handleInputChange}
                                />
                            </div>

                            <div className='my-2 flex'>
                                <p className=' self-center text-left mr-3 font-medium basis-28'>
                                    Kaca:
                                </p>

                                <input type="number"
                                    min="0"
                                    id="eachRowKaca"
                                    className='px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                    name="kaca"
                                    value={update.kaca}
                                    onChange={handleInputChange}
                                />
                            </div>

                            <div className='my-2 flex'>
                                <p className=' self-center text-left mr-3 font-medium basis-28'>
                                    Karet:
                                </p>

                                <input type="number"
                                    min="0"
                                    id="eachRowKaret"
                                    className='px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                    name="karet"
                                    value={update.karet}
                                    onChange={handleInputChange}
                                />
                            </div>

                            <div className='my-2 flex'>
                                <p className=' self-center text-left mr-3 font-medium basis-28'>
                                    Plastik:
                                </p>

                                <input type="number"
                                    min="0"
                                    id="eachRowPlastik"
                                    className='px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                    name="plastik"
                                    value={update.plastik}
                                    onChange={handleInputChange}
                                />
                            </div>

                            <div className='my-2 flex'>
                                <p className=' self-center text-left mr-3 font-medium basis-28'>
                                    Logam:
                                </p>

                                <input type="number"
                                    min="0"
                                    id="eachRowLogam"
                                    className='px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                    name="logam"
                                    value={update.logam}
                                    onChange={handleInputChange}
                                />
                            </div>

                            <div className='my-2 flex'>
                                <p className=' self-center text-left mr-3 font-medium basis-28'>
                                    Lain-lain:
                                </p>

                                <input type="number"
                                    min="0"
                                    id="eachRowLain"
                                    className='px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                    name="lain_lain"
                                    value={update.lain_lain}
                                    onChange={handleInputChange}
                                />
                            </div>

                            <div className='my-2 flex'>
                                <p className=' self-center text-left mr-3 font-medium basis-28'>
                                    Organik:
                                </p>

                                <input type="number"
                                    min="0"
                                    id="eachRowOrganik"
                                    className='px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                    name="sampah_organik"
                                    value={update.sampah_organik}
                                    onChange={handleInputChange}
                                />
                            </div>

                            <div className='my-2 flex'>
                                <p className=' self-center text-left mr-3 font-medium basis-28'>
                                    Ke TPA:
                                </p>

                                <input type="number"
                                    min="0"
                                    id="eachRowTPA"
                                    className='px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                    name="diteruskan_ke_tpa"
                                    value={update.diteruskan_ke_tpa}
                                    onChange={handleInputChange}
                                />
                            </div>
                        </form>
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
                            onClick={updateData}
                            class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                            Update Data
                        </button>
                    </div>
                </div>
            </div>
        </div>

    );
}


export default DeleteModal;