 import { CSVLink, CSVDownload } from "react-csv";



const UnduhDataSampah = ({ sampah }) => {
    const current = new Date();
    const date = `${current.getDate()}_${current.getMonth()+1}_${current.getFullYear()}`;
    const headers = [
        { label: "ID", key: "id" },
        { label: "Tgl Masuk", key: "created_at" },
        { label: "TPS", key: "name" },
        { label: "Sampah Kaca", key: "berat_sampah_kaca" },
        { label: "Sampah karet", key: "berat_sampah_karet" },
        { label: "Sampah Plastik", key: "berat_sampah_plastik" },
        { label: "Sampah Logam", key: "berat_sampah_logam" },
        { label: "Sampah Kertas", key: "berat_sampah_kertas" },
        { label: "Sampah Lain-lain", key: "berat_sampah_lain_lain" },
        { label: "Sampah Anorganik", key: "berat_sampah_anorganik" },
        { label: "Sampah Organik", key: "berat_sampah_organik" },
        { label: "Sampah TPA", key: "berat_sampah_ke_tpa" },
        { label: "Sampah Diolah", key: "berat_sampah_diolah" },
        { label: "Sampah Total", key: "berat_sampah_total" }
    ];
    

    return (
        <div>
            <CSVLink
                headers={headers}
                data={sampah}
                filename={"data sampah-" + date + ".csv"}
                separator={";"}
                className="flex px-10 py-2.5 justify-between rounded self-center bg-green-600 text-white font-medium leading-tight shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none hover:scale-110 focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                target="_blank"
            >
                Unduh CSV
                <span class="iconify ml-1 h-5 w-5" data-icon="material-symbols:sim-card-download-rounded"></span>
            </CSVLink>
        </div>


    );
}


export default UnduhDataSampah;