// /**
//  * Padroniza dados de gráficos (Apex/Livewire) para formato tabular
//  */
// const padronizarDados = (rawData) => {
//     if (!rawData) return [];

//     // Cenário 1: Pizza/Donut (Simples: label + serie)
//     if (rawData.labels && Array.isArray(rawData.series) && typeof rawData.series[0] !== 'object') {
//         return rawData.labels.map((l, i) => ({ 'Categoria': l, 'Valor': rawData.series[i] || 0 }));
//     }

//     // Cenário 2: Barras/Linhas (Complexo: categories + series[{name, data}])
//     let cats = rawData.categories || (rawData.xaxis?.categories) || rawData.labels;
//     let series = rawData.series;

//     if (cats && Array.isArray(cats) && Array.isArray(series)) {
//         return cats.map((cat, i) => {
//             let row = { 'Período/Categoria': cat };
//             series.forEach(s => {
//                 if (typeof s === 'object' && s.data) row[s.name] = s.data[i] ?? '';
//                 else if (Array.isArray(s)) row[`Série ${i + 1}`] = s[i];
//             });
//             return row;
//         });
//     }

//     // Cenário 3: Array de Objetos já pronto
//     if (Array.isArray(rawData) && rawData.length > 0 && typeof rawData[0] === 'object') return rawData;

//     return [];
// };

// // Exportar CSV
// export const baixarCSV = (rawData) => {
//     const data = padronizarDados(rawData);
//     if (!data.length) return alert("Sem dados para exportar.");

//     const headers = Object.keys(data[0]);
//     const csvRows = [headers.join(',')];

//     data.forEach(row => {
//         const values = headers.map(h => `"${('' + (row[h] ?? '')).replace(/"/g, '""')}"`);
//         csvRows.push(values.join(','));
//     });

//     const link = document.createElement('a');
//     link.href = URL.createObjectURL(new Blob(['\uFEFF' + csvRows.join('\n')], { type: 'text/csv;charset=utf-8;' }));
//     link.download = `relatorio_${Date.now()}.csv`;
//     link.click();
// };

// // Exportar PDF
// export const baixarPDF = (rawData) => {
//     const data = padronizarDados(rawData);
//     if (!data.length) return alert("Sem dados para exportar.");

//     try {
//         const doc = new window.jsPDF(); // Usa lib global

//         doc.setFontSize(14);
//         doc.text("Relatório Exportado", 14, 15);
//         doc.setFontSize(10);
//         doc.text(`Gerado em: ${new Date().toLocaleDateString('pt-BR')}`, 14, 22);

//         window.autoTable(doc, { // Usa plugin global
//             head: [Object.keys(data[0])],
//             body: data.map(Object.values),
//             startY: 25,
//             theme: 'grid',
//             styles: { fontSize: 8 }
//         });

//         doc.save(`relatorio_${Date.now()}.pdf`);
//     } catch (e) {
//         console.error("PDF Error:", e);
//         alert("Erro ao gerar PDF.");
//     }
// };

// // Exportar XLSX
// export const baixarXLSX = (rawData) => {
//     const data = padronizarDados(rawData);
//     if (!data.length) return alert("Sem dados para exportar.");

//     try {
//         // 1. Cria a planilha (Worksheet) baseada no JSON
//         const ws = window.XLSX.utils.json_to_sheet(data);

//         // 2. Cria o arquivo (Workbook) e adiciona a planilha
//         const wb = window.XLSX.utils.book_new();
//         window.XLSX.utils.book_append_sheet(wb, ws, "Relatório");

//         // 3. Gera o download
//         window.XLSX.writeFile(wb, `relatorio_${Date.now()}.xlsx`);
//     } catch (e) {
//         console.error("XLSX Error:", e);
//         alert("Erro ao gerar Excel.");
//     }
// };


// Funções UI (Refresh/Expand)
export const Refresh = (id) => {
    window.dispatchEvent(new CustomEvent('chart:refresh', { detail: { cardId: id } }));
};

export const toggleExpand = (id) => {
    const card = document.getElementById(id);
    if (card) {
        card.classList.toggle('col-span-full');
        card.classList.toggle('z-10');
        setTimeout(() => window.dispatchEvent(new Event('resize')), 300);
    }
};