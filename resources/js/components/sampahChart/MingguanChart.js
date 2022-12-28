import React from "react";
import Chart from "chart.js/auto";
import { Bar } from "react-chartjs-2";

const MingguanChart = ({ props }) => {
  const labels = props.days;
  const data = {
    labels: labels,
    datasets: [
      {
        label: "Data Sampah Mingguan",
        backgroundColor: "#F5CD3F",
        borderColor: "#17cf67 ",
        data: props.berat,
      },
    ],
  };

  return (
    <div>
      <Bar data={data} />
    </div>
  );
};

export default MingguanChart;