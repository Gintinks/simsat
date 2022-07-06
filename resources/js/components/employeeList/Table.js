import React, { useState, useEffect } from 'react';
import TableActionButtons from './TableActionButtons';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import JsonData from "./MOCK_DATA";
import CreateModal from "./Modals/CreateModal";
import ReactPaginate from "react-paginate";


function App() {
    const [users, setUsers] = useState(JsonData.slice(0, 30));
    const [pageNumber, setPageNumber] = useState(0);

    const usersPerPage = 10;
    const pagesVisited = pageNumber * usersPerPage;

    const displayUsers = users
        .slice(pagesVisited, pagesVisited + usersPerPage)
        .map((user) => {
            return (
                <tbody>
                    <tr>
                        <th>{user.id}</th>
                        <td>{user.name}</td>
                        <td>{user.email}</td>
                        <td>{user.role}</td>
                        <td>
                            <TableActionButtons eachRowId={user.id} />
                        </td>
                    </tr>
                </tbody>
            );
        });


    const pageCount = Math.ceil(users.length / usersPerPage);

    const changePage = ({ selected }) => {
        setPageNumber(selected);
    };

    return (
        <div className="overflow-hidden">
            <ToastContainer />

            <div className="">
                <div className="col-md-8">
                    <CreateModal />
                    <div className="card">
                        <table className="table table-hover align-middle text-center">
                            <thead>
                                <tr>
                                    <th scope="col" width="30px">#</th>
                                    <th scope="col" width="150px">Nama</th>
                                    <th scope="col" width="150px">Email</th>
                                    <th scope="col" width="50px">TPS</th>
                                    <th scope="col" width="100px">Aksi</th>
                                </tr>
                            </thead>
                            {displayUsers}
                        </table>
                    </div>
                    <ReactPaginate
                        previousLabel={"Previous"}
                        breakLabel="..."
                        nextLabel={"Next"}
                        pageCount={pageCount}
                        onPageChange={changePage}
                        containerClassName={"pagination d-flex justify-content-end mt-2"}
                        previousLinkClassName={"page-link"}
                        nextLinkClassName={"page-link"}
                        disabledClassName={"paginationDisabled"}
                        activeClassName={"active"}
                        breakClassName={'page-item'}
                        breakLinkClassName={'page-link'}
                        pageClassName={'page-item'}
                        pageLinkClassName={'page-link'}
                        previousClassName={'page-item'}
                        nextClassName={'page-item'}
                    />
                </div>
            </div>
        </div>
    );
}

export default App;

