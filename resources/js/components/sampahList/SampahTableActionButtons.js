import axios from 'axios';
import React, { useState, useEffect } from 'react';
import { toast } from 'react-toastify';


const SampahTableActionButtons = ({eachRowId}) => {
   
    return (
        <div className='flex md:justify-center '>
            <div class="group">
            <button type="button" className="  inline-block p-2 mr-2 bg-gray-300  leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-toggle="modal"
                data-bs-target="#exampleModalCenter">
                <span class="tooltip-text border border-black bg-white p-3 -mt-12 -ml-16 rounded hidden group-hover:block absolute text-center py-2 px-6 z-50">Edit Data</span>
                <span class="iconify h-5 w-5" data-icon="clarity:note-edit-line"></span>
            </button>
            </div>
            <div class="group">
            <button type="button" className="inline-block p-2  bg-gray-300  leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-toggle="modal"
                data-bs-target={'#deleteModal' + eachRowId}>
               <span class="tooltip-text border border-black bg-white p-3 -mt-12 -ml-16 rounded hidden group-hover:block absolute text-center py-2 px-6 z-50">Hapus Data</span>
                <span class="iconify h-5 w-5" data-icon="fe:trash"></span>
            </button>
            </div>
            {/* <DeleteModal  eachRowId={eachRowId} /> */}
        </div>
        
    );
}

export default SampahTableActionButtons;