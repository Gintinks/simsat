import React from 'react';
import Table from './employeeList/Table'


function App() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                {/* components goes here */}
                <h1 className=' text-xl md:text-2xl py-3 font-semibold' >Selamat Datang di Halaman Admin</h1>
                <Table />
            </div>
        </div>
    );
}

export default App;