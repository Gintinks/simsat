import React, { useState, useEffect } from 'react';
import { toast } from 'react-toastify';



const ViewModal = ({ eachRowId }) => {
    const [tps, setTps] = useState([]);
    React.useEffect(() => {
        axios.get('/list-tps').then((response) => {
            setTps(response.data);
        });
    }, []);

    return (
        <div className="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id={"viewModal" + eachRowId.id} tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
            <div className="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                <div className="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    <div className="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                        <h5 className="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                            View Data
                        </h5>
                        <button type="button"
                            className="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="my-3 self-center">
                        <img src="https://media.istockphoto.com/id/1016761216/id/foto/konsep-potret.jpg?s=1024x1024&w=is&k=20&c=Oy8kjwNy5rhuUxb9CYZ7VDAvhVIeadolIEWvU5at9QU=" class=" w-40 h-40 rounded-full" alt=""></img>
                    </div>
                    <div className='pl-6'>
                        <div className='flex p-1 text-lg font-medium'>
                            <p className=' basis-28 text-left'>Nama</p>
                            <p>: {eachRowId.name}</p>
                        </div>

                        <div className='flex p-1 text-lg font-medium'>
                            <p className=' basis-28 text-left'>Email</p>
                            <p>: {eachRowId.email}</p>
                        </div>

                        <div className='flex p-1 text-lg font-medium'>
                            <p className=' basis-28 text-left'>Role</p>
                            {eachRowId.priviliges_id == 2 ? <p>: Manajemen DLH</p> : <p>: TPS</p>}
                        </div>
                        {eachRowId.priviliges_id == 2 ? null :
                            <div className='flex p-1 text-lg font-medium'>
                                <p className=' basis-28 text-left'>TPS</p>
                                {tps.map((value) => {
                                    if (value.id == eachRowId.tps_id) {
                                        return (
                                            <div value={value.id}>: {value.name}</div>
                                        );
                                    }
                                })}
                            </div>
                        }
                    </div>
                    <div
                        className="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                        <button type="button"
                            className="inline-block px-6 py-2.5 bg-gray-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

    );
}

export default ViewModal;