import React, { Component } from 'react';
import TableRow from './TableRow';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import CreateModal from "./Modals/CreateModal";



class Table extends Component {


    constructor(props) {
        super(props);

        this.state = {
            employees: [],
        }
    }


    // Life cycle method.
    componentDidMount() {
        this.getEmployeeList();
    }


    // Get Employee List.
    getEmployeeList = () => {
        let self = this;
        axios.get('/get/employee/list').then(function (response) {
            self.setState({
                employees: response.data
            });
        });
    }

    render() {
        return (
    
            <div className="container">
                <ToastContainer />
                <h1 class="text-2xl font-bold  ml-3 pb-3 text-center md:text-left">
                    <a href="">Master Data</a>
                </h1>
                <div className="row justify-content-center">
                    <div className="col-md-8">
                    <CreateModal/>
                        <div className="card">
                        <table className="table table-hover text-center">
                            <thead>
                                <tr>
                                <th scope="col" width="30px">#</th>
                                <th scope="col" width="150px">Nama</th>
                                <th scope="col" width="150px">Email</th>
                                <th scope="col" width="50px">TPS</th>
                                <th scope="col" width="100px">Aksi</th>
                                </tr>
                            </thead>
                                <tbody>
                                    {this.state.employees.map(function (x, i) {
                                        return <TableRow key={i} data={x} /> 
                                    })}
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Table;

