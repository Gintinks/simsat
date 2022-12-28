import React from 'react';
import ReactDOM from 'react-dom';
import App from './components/App';
import SampahData from './components/SampahData';
import SampahGraph from './components/SampahGraph';





if (document.getElementById('employeeeApp')) {
    ReactDOM.render(<App />, document.getElementById('employeeeApp'));
}

if (document.getElementById('sampahData')) {
    ReactDOM.render(<SampahData />, document.getElementById('sampahData'));
}

if (document.getElementById('sampahGraph')) {
    ReactDOM.render(<SampahGraph />, document.getElementById('sampahGraph'));
}