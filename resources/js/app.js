import './bootstrap';
import { initFlowbite } from 'flowbite';
import ApexCharts from 'apexcharts';
import { DataTable } from 'simple-datatables';

window.ApexCharts = ApexCharts;
window.DataTable = DataTable;

document.addEventListener('DOMContentLoaded', () => {
    initFlowbite();
});
