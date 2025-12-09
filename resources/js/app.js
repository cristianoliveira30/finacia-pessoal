import './bootstrap';
import { initFlowbite } from 'flowbite';
import ApexCharts from 'apexcharts';
import { DataTable } from 'simple-datatables';
import { toggleExpand } from './composables/card.js';

window.ApexCharts = ApexCharts;
window.DataTable = DataTable;
window.toggleExpand = toggleExpand;

document.addEventListener('DOMContentLoaded', () => {
    initFlowbite();
});
