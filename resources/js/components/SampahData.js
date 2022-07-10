import React from 'react';
import SampahTable from './sampahList/SampahTable'


function SampahData() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                {/* components goes here */}
                <h1 className=' text-xl md:text-2xl py-9 font-semibold ' >Selamat Datang di Halaman List Sampah</h1>
                <SampahTable />
            </div>
        </div>
    );
}

export default SampahData;