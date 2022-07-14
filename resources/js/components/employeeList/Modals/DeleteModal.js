import axios from 'axios';
import React, { useState, useEffect } from 'react';
import { toast } from 'react-toastify';



const DeleteModal = ({ eachRowId }) => {
   
    const deleteData = (eachRowId) => {
        const packets = {
            id: eachRowId,
        };
        
        axios.post('/delete', packets)
            .then(() => {
                toast.error("Akun Sudah Terhapus");

                setTimeout(() => {
                    location.reload();
                }, 2500)
            })
    }


    return (

        <div className="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id={"deleteModal" + eachRowId.id} tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
            <div className="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                <div className="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    <div className="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                        <h5 className="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                            WARNING
                        </h5>
                        <button type="button"

                            className="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body relative p-4 mx-3">
                        <p className=' text-lg'>
                            Data akan hilang secara permanen jika dihapus.
                        </p>
                        <p className=' text-red-500 text-lg font-semibold'>
                            Apakah anda yakin mau menghapus akun?
                        </p>
                    </div>
                    <div
                        className="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                        <button type="button"

                            className="inline-block px-6 py-2.5 bg-gray-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="button"
                            onClick={() => { deleteData(eachRowId.id) }}
                            class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                            Hapus Pengguna
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
}


export default DeleteModal;