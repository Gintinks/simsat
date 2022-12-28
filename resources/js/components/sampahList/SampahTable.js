import React, { useState, useEffect } from 'react';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import ReactPaginate from "react-paginate";
import SampahTableActionButtons from './SampahTableActionButtons';
import FilterSampah from './Modals/FilterSampah';
import UnduhDataSampah from './UnduhDataSampah';


function App() {
    const [post, setPost] = useState([]);
    const [filterPost, filterSetPost] = useState([]);
    let count=1;
    React.useEffect(() => {
        axios.get('/sampahList').then((response) => {
            // const dataFilter = response.data.filter((curData) => {
            //     return curData.berat_sampah_karet === 0
            // })
            setPost(response.data);
            // filterSetPost(response.data);
        });
    }, []);

    
    // const [users, setUsers] = useState(post);
    const [pageNumber, setPageNumber] = useState(0);

    const usersPerPage = 10;
    const pagesVisited = pageNumber * usersPerPage;

    const displayUsers = post
        .slice(pagesVisited, pagesVisited + usersPerPage)
        .map((sampah) => {
            return (
                <tbody>

                    <tr className={`${count % 2 == 0 ? ' bg-white' : ' bg-blue-50 '} border-b transition duration-300 ease-in-out hover:bg-slate-200`}>
                    <th className="text-sm  w-6 py-2   whitespace-nowrap border-r border-gray-300">{sampah.created_at.split('T')[0]}</th>
                        <td className=' w-24 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.name}</td>
                        <td className='w-10 py-2 border-r border-gray-300'>{sampah.berat_sampah_organik}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.berat_sampah_anorganik}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.berat_sampah_kaca}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.berat_sampah_karet}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.berat_sampah_plastik}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.berat_sampah_logam}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.berat_sampah_kertas}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.berat_sampah_lain_lain}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300 '>{sampah.berat_sampah_diolah}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.berat_sampah_ke_tpa}</td>
                        <td className='w-10 py-2 whitespace-nowrap border-r border-gray-300'>{sampah.berat_sampah_total}</td>
                        <td className='w-16 py-2   whitespace-nowrap border-r border-gray-300'>
                            <SampahTableActionButtons eachRowId={sampah} />
                        </td>
                    </tr>
                </tbody>
            );
        });


    const pageCount = Math.ceil(post.length / usersPerPage);
    
  
    const handleFilter = (data) => {
        
        setPost(data);
    }

    const changePage = ({ selected }) => {
        setPageNumber(selected);
    };

    return (

        <div className=" h-screen bg-blue p-3 md:p-20 rounded-3xl" >
            <div className='flex justify-between  pb-3'>
                <button type="button" className=" rounded-sm flex justify-between px-10 py-2.5 bg-blue-600 text-white font-medium leading-tight shadow-md hover:bg-blue-700 hover:shadow-lg hover:scale-110 focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter">
                    Filter
                    <span class="iconify ml-1 h-4 w-4" data-icon="charm:filter"></span>
                </button>

                <UnduhDataSampah sampah={post} />
            </div>

            <FilterSampah filterData={handleFilter} filterDataNama/>
            <ToastContainer />

            <div className="flex flex-col">
                <div className="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div className="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div className='overflow-x-auto'>
                            <table className="min-w-full border text-center table-fixed">
                                <thead className="border-b bg-bluer border-gray-300">
                                    <tr>
                                        <th scope="col" className=" w-3  border-r border-gray-300" >Tanggal</th>
                                        <th scope="col" className=" border-r border-gray-300" >Nama TPS3R</th>
                                        <th scope="col" className="w-10 py-1 border-r border-gray-300" >Organik (Kg)</th>
                                        <th scope="col" className="w-10 py-2  border-r border-gray-300" >Anorganik (Kg)</th>
                                        <th scope="col" className="w-10 py-2  border-r border-gray-300" >Kaca (Kg)</th>
                                        <th scope="col" className="w-10 py-2 border-r border-gray-300" >Karet (Kg)</th>
                                        <th scope="col" className="w-10 py-2  border-r border-gray-300" >Plastik (Kg)</th>
                                        <th scope="col" className="w-10 py-2  border-r border-gray-300" >Logam (Kg)</th>
                                        <th scope="col" className="w-10 py-2  border-r border-gray-300" >Kertas (Kg)</th>
                                        <th scope="col" className="w-10 py-2  border-r border-gray-300" >Lain-lain (Kg)</th>
                                        <th scope="col" className="w-10 py-2  border-r border-gray-300" >Sampah Terolah (Kg)</th>
                                        <th scope="col" className="w-10 py-2  border-r border-gray-300" >Sampah TPA (Kg)</th>
                                        <th scope="col" className="w-10 py-2 border-r border-gray-300" >Total (Kg)</th>
                                        <th scope="col" className="w-10 py-2  border-r border-gray-300" >Aksi</th>
                                    </tr>
                                </thead>
                                {displayUsers}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <ReactPaginate
                previousLabel={"Previous"}
                breakLabel="..."
                nextLabel={"Next"}
                pageCount={pageCount}
                onPageChange={changePage}
                containerClassName={"flex justify-center md:justify-end mt-2 "}
                previousLinkClassName={"page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"}
                nextLinkClassName={"page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"}
                disabledClassName={"page-item disabled"}
                activeClassName={"page-item active bg-blue-600 rounded"}
                breakClassName={'page-item'}
                breakLinkClassName={'page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none'}
                pageClassName={'page-item bg-white'}
                pageLinkClassName={'page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none'}
                previousClassName={'page-item bg-white'}
                nextClassName={'page-item bg-white'}
            />
        </div>
    );
}

export default App;