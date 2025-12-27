import './bootstrap';
import * as XLSX from 'xlsx';
import * as simpleDatatables from 'simple-datatables';
import {baixarCSV, baixarPDF, baixarXLSX} from './composables/useDownload.js';
import { toggleExpand, Refresh, bindAllCardsAI } from './composables/useCard.js';
import { toggleFilter } from './composables/useFilter';
import { useAlerts } from './composables/useAlerts.js';
import { initFlowbite, Dropdown } from 'flowbite';
import { api } from './composables/useApi.js';
import autoTable from 'jspdf-autotable';
import ApexCharts from 'apexcharts';
import jsPDF from 'jspdf';

// 2. Lógica do Card

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
window.bindAllCardsAI = bindAllCardsAI;
window.baixarCSV = baixarCSV;
window.baixarPDF = baixarPDF;
window.baixarXLSX = baixarXLSX;
window.toggleFilter = toggleFilter;

document.addEventListener('DOMContentLoaded', () => initFlowbite());

// inicia scripts apenas se estiverem em uma dashboard
document.addEventListener("DOMContentLoaded", () => {
  if (document.querySelector("[data-page-ai]")) {
    bindAllCardsAI();
  }
});
