import React, { useState, useEffect } from 'react';
import TableActionButtons from './TableActionButtons';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import JsonData from "./MOCK_DATA";
import CreateModal from "./Modals/CreateModal";
import ReactPaginate from "react-paginate";


function App() {
    const [post, setPost] = useState([]);
    let count = 1;
    React.useEffect(() => {
        axios.get('/userList').then((response) => {
            setPost(response.data);
        });
    }, []);


    // const [users, setUsers] = useState(post);
    const [pageNumber, setPageNumber] = useState(0);

    const usersPerPage = 10;
    const pagesVisited = pageNumber * usersPerPage;

    const displayUsers = post
        .slice(pagesVisited, pagesVisited + usersPerPage)
        .map((user) => {
            return (
                <tbody>

                    <tr className="border-b transition duration-300 ease-in-out hover:bg-gray-100">
                        <th className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r">{count++}</th>
                        <td className='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r'>{user.name}</td>
                        <td className='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r'>{user.email}</td>
                        <td className='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r'>{user.priviliges_id == 2 ? "Manajemen DLH " : "Petugas TPS"}</td>
                        <td className=' max-h-5 max w-14 px-2'>
                            <TableActionButtons eachRowId={user}  />
                          
                        </td>
                    </tr>
                </tbody>
            );
        });


    const pageCount = Math.ceil(post.length / usersPerPage);

    const changePage = ({ selected }) => {
        setPageNumber(selected);
    };

    return (
        <div className="">

            <ToastContainer />

            <CreateModal />
            <div className="flex flex-col ">
                <div className="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div className="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div className='overflow-x-auto'>
                            <table className="min-w-full border text-center bg-white">
                                <thead className="border-b">
                                    <tr>
                                        <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 border-r" >#</th>
                                        <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 border-r" >Nama</th>
                                        <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 border-r" >Email</th>
                                        <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 border-r" >TPS</th>
                                        <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 border-r" >Aksi</th>
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
                activeClassName={"page-item active bg-blue-600 rounded text-gray-200 "}
                breakClassName={'page-item'}
                breakLinkClassName={'page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none'}
                pageClassName={'page-item'}
                pageLinkClassName={'page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none'}
                previousClassName={'page-item bg-white'}
                nextClassName={'page-item bg-white'}
            />
        </div>
    );
}

export default App;

