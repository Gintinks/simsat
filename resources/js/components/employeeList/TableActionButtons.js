import React, { useState, useEffect } from 'react';
import { toast } from 'react-toastify';
import ViewModal from './Modals/ViewModal';
import UpdateModal from './Modals/UpdateModal';
import DeleteModal from './Modals/DeleteModal';

const TableActionButtons = ({ eachRowId }) => {

    return (
        <div className='flex md:justify-center '>
            <div className='group'>
                <button type="button" className="  inline-block p-2 mr-2 bg-gray-300  leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-toggle="modal"
                    data-bs-target={'#viewModal' + eachRowId.id}>
                    <span class="tooltip-text border border-black bg-white p-3 -mt-12 -ml-16 rounded hidden group-hover:block absolute text-center py-2 px-6 z-50">View Akun</span>
                    <span class="iconify" data-icon="el:eye-open"></span>
                </button>
            </div>
            <div className='group'>

                <button type="button" className="inline-block p-2  bg-gray-300  leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-toggle="modal"
                    data-bs-target={'#deleteModal' + eachRowId.id}>
                    <span class="tooltip-text border border-black bg-white p-3 -mt-12 -ml-16 rounded hidden group-hover:block absolute text-center py-2 px-6 z-50">Hapus Akun</span>
                    <span class="iconify h-5 w-5" data-icon="fe:trash"></span>
                </button>

            </div>
            <DeleteModal eachRowId={eachRowId} />
            <ViewModal eachRowId={eachRowId}/>
        </div>

    );
}

export default TableActionButtons;