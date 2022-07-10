import React from 'react';
import ReactDOM from 'react-dom';
import App from './components/App';
import SampahData from './components/SampahData';





if (document.getElementById('employeeeApp')) {
    ReactDOM.render(<App />, document.getElementById('employeeeApp'));
}


if (document.getElementById('sampahData')) {
    ReactDOM.render(<SampahData />, document.getElementById('sampahData'));
}