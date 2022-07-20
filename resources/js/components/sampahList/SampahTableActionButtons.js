import axios from 'axios';
import React, { useState, useEffect } from 'react';
import { toast } from 'react-toastify';
import UpdateModal from './Modals/UpdateModalSampah';
import DeleteModal from './Modals/DeleteModalSampah';


const SampahTableActionButtons = ({ eachRowId }) => {

    return (
        <div className='flex md:justify-center '>
            <div class="group">
                <button type="button" className="  inline-block p-2 mr-2 bg-gray-300 hover:text-yellow-400  leading-tight uppercase rounded shadow-md hover:bg-gray-500 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-700 active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-toggle="modal"
                    data-bs-target={'#updateModal' + eachRowId.id}>
                    <span class="text-white tooltip-text border bg-green-400  -mt-12 -ml-16 rounded-xl hidden group-hover:block absolute text-center py-2 px-6 z-50">Edit Data</span>
                    <span class="iconify h-5 w-5" data-icon="clarity:note-edit-line"></span>
                </button>
            </div>
            <div class="group">
                <button type="button" className="inline-block p-2  bg-gray-300 hover:text-red-700  leading-tight uppercase rounded shadow-md hover:bg-gray-500 hover:shadow-lg  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-700 active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-toggle="modal"
                    data-bs-target={'#deleteModal' + eachRowId.id}>
                    <span class="text-white tooltip-text border bg-green-400  -mt-12 -ml-16 rounded-xl hidden group-hover:block absolute text-center py-2 px-6 z-50">Hapus Data</span>
                    <span class="iconify h-5 w-5 " data-icon="fe:trash"></span>
                </button>
            </div>
            <DeleteModal  eachRowId={eachRowId} />
            <UpdateModal eachRowId={eachRowId} />
        </div>

    );
}

export default SampahTableActionButtons;