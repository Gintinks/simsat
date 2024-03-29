import axios from 'axios';
import React, { Component } from 'react';
import { toast } from 'react-toastify';


class UpdateModal extends Component {

    constructor(props) {
        super(props);

        this.state = {
            name: this.props.eachRowId.name,
            email: this.props.eachRowId.email,
            password: this.props.eachRowId.password,
            priviliges: "manajemenDlh",
            TPS: 0,
            isCheckedVisible: this.props.eachRowId.priviliges_id == 2 ?false : true,
        }
    }

    // Creating employee name state.

    inputEmployeeName = (event) => {
        this.setState({
            name: event.target.value,
        });
    }

    // Creating employee salary state.

    inputEmployeeEmail = (event) => {
        this.setState({
            email: event.target.value,
        });
    }

    inputEmployeePassword = (event) => {
        this.setState({
            password: event.target.value,
        });
    }

    inputEmployeeTPS = (event) => {
        this.setState({
            TPS: event.target.value,
        });

    }


    // Storing Employee Data.

    storeEmployeeData = () => {

        // if (this.state.isCheckedVisible == true) {
        //     this.setState({
        //         priviliges:"tps"
        //     });
        // }else{
        //     this.setState({
        //         priviliges:"managemenDlh",
        //         TPS:0
        //     });
        // }
        //  toast.success(this.state.isCheckedVisible)
        const packets = {
            id :this.props.eachRowId.id,
            name: this.state.name,
            email: this.state.email,
            password: this.state.password,
        };

        axios.post('/update', packets)
            .then(() => {
                toast.warn("Akun Sudah di Update");

                setTimeout(() => {
                    location.reload();
                }, 2500)
            })
    }

    render() {
        return (
            <div >
                <div className="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id={'updateModal' + this.props.eachRowId.id} tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                    <div className="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                        <div className="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                            <div className="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                <h5 className="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                                    Buat Akun Baru
                                </h5>
                                <button type="button"
                                    className="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="modal-body text-left relative p-4 mx-3">
                                <form className=''>
                                    <div className='my-2 text-sm'>
                                        <p>
                                            Nama
                                        </p>

                                        <input type="text"
                                            id="employeeName"
                                            className='px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                            value={this.state.name}
                                            onChange={this.inputEmployeeName}
                                        />
                                    </div>

                                    <div className='my-2 text-sm'>
                                        <p>
                                            Email
                                        </p>
                                        <input type="email"
                                            id="employeeEmail"
                                            className='px-3 my-2 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                            value={this.state.email}
                                            onChange={this.inputEmployeeEmail}
                                            readonly
                                        />
                                    </div>

                                    <div className='my-2 text-sm'>
                                        <p>
                                            Password
                                        </p>
                                        <input type="text"
                                            id="employeePassword"
                                            className='px-3 my-2 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1'
                                            value={this.state.password}
                                            onChange={this.inputEmployeePassword}
                                        />
                                    </div>

                                    <div className='my-2 text-sm'>
                                        <p>
                                            Pilih Role
                                        </p>
                                        <div className="mb-3 ">
                                            <button type="button" className={`${this.state.isCheckedVisible ? ' border-yellow-500 text-yellow-500' : 'bg-yellow-500 text-white '} inline-block px-6 py-2 border-2 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out`}>Management DLH</button>
                                            <button type="button"  className={`${this.state.isCheckedVisible ? ' bg-green-500 text-white' : ' border-green-500 text-green-500'} inline-block px-6 py-2 border-2 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out`}>Petugas TPS</button>
                                        </div>
                                    </div>
                                    {
                                        this.state.isCheckedVisible ? <div className='my-2 text-sm'>
                                            <p>
                                                Pilih TPS
                                            </p>
                                            <div class="mb-3 ">
                                                <select onChange={this.inputEmployeeTPS} class="form-select appearance-none
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
                                                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                                    <option selected >TPS Tidak dapat Diganti</option>
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div> : null
                                    }


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
                                    onClick={this.storeEmployeeData}
                                    class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                    Update Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default UpdateModal;