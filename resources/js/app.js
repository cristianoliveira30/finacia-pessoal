import './bootstrap';
import * as XLSX from 'xlsx';
import * as Card from './composables/useCard.js';
import * as simpleDatatables from 'simple-datatables';
import { baixarCSV, baixarPDF, baixarXLSX } from './composables/useDownload.js';
import { toggleFilter } from './composables/useFilter';
import { useAlerts } from './composables/useAlerts.js';
import { initFlowbite, Dropdown } from 'flowbite';
import { api } from './composables/useApi.js';
import autoTable from 'jspdf-autotable';
import ApexCharts from 'apexcharts';
import jsPDF from 'jspdf';

// Exposição Global
window.jsPDF = jsPDF;
window.autoTable = autoTable;
window.ApexCharts = ApexCharts;
window.simpleDatatables = simpleDatatables;
window.Dropdown = Dropdown;
window.XLSX = XLSX;

window.baixarCSV = baixarCSV;
window.baixarPDF = baixarPDF;
window.baixarXLSX = baixarXLSX;
window.toggleFilter = toggleFilter;


// expoes funcoes para cards
window.Card = Card;
window.toggleExpand = Card.toggleExpand;
window.Refresh = Card.Refresh;
window.bindAllCardsAI = Card.bindAllCardsAI;

document.addEventListener('DOMContentLoaded', () => initFlowbite());

// inicia scripts apenas se estiverem em uma dashboard
document.addEventListener("DOMContentLoaded", () => {
  if (document.querySelector("[data-page-ai]")) {
    window.Card?.bindAllCardsAI?.();
    window.Card?.bindAllOverlayToggles?.(); // ✅ agora é aqui
  }
});
