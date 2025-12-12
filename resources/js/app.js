import './bootstrap';
import { initFlowbite, Dropdown } from 'flowbite';
import * as simpleDatatables from 'simple-datatables';
import ApexCharts from 'apexcharts';
import { toggleExpand } from './composables/card.js';

// Expor libs no escopo global
window.ApexCharts = ApexCharts;
window.simpleDatatables = simpleDatatables; // << ESSENCIAL
window.DataTable = simpleDatatables.DataTable; // compat, se você usar em outro lugar
window.Dropdown = Dropdown;

window.toggleExpand = toggleExpand;

document.addEventListener('DOMContentLoaded', () => {
    initFlowbite();
});
