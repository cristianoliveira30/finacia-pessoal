import './bootstrap';
import { initFlowbite, Dropdown } from 'flowbite';
import * as simpleDatatables from 'simple-datatables';
import ApexCharts from 'apexcharts';
import * as XLSX from 'xlsx';

// 1. Libs de PDF
import jsPDF from 'jspdf';
import autoTable from 'jspdf-autotable';

// 2. Lógica do Card
import { toggleExpand, Refresh, baixarCSV, baixarPDF, baixarXLSX } from './composables/card.js';

// 3. Exposição Global
window.jsPDF = jsPDF;
window.autoTable = autoTable;
window.ApexCharts = ApexCharts;
window.simpleDatatables = simpleDatatables;
window.Dropdown = Dropdown;
window.XLSX = XLSX;

// Expondo funções do card para uso no Blade
window.toggleExpand = toggleExpand;
window.Refresh = Refresh;
window.baixarCSV = baixarCSV;
window.baixarPDF = baixarPDF;
window.baixarXLSX = baixarXLSX;

document.addEventListener('DOMContentLoaded', () => initFlowbite());