@props([
    'config' => [],
])

@php
    $tableId = $config['id'] ?? 'export-table';
    $columns = $config['columns'] ?? [];
    $rows = $config['rows'] ?? [];

    $defaultLabels = [
        'placeholder' => 'Buscar...',
        'searchTitle' => 'Buscar na tabela',
        'pageTitle' => 'Página {page}',
        'perPage' => 'registros por página',
        'noRows' => 'Nenhum registro encontrado',
        'info' => 'Mostrando {start} até {end} de {rows} registros',
        'noResults' => 'Nenhum resultado corresponde à busca',
    ];

    $labels = array_merge($defaultLabels, $config['labels'] ?? []);
    $datatableOptions = $config['datatable'] ?? [];
@endphp

@once
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js"></script>
@endonce

<table id="{{ $tableId }}">
    <thead>
        <tr>
            @foreach ($columns as $index => $column)
                @php
                    $key = $column['key'] ?? '';
                    $label = $column['label'] ?? ucfirst($key);
                    $type = $column['type'] ?? 'text';
                    $dateFormat = $column['date_format'] ?? null;
                    
                    // Definição do tipo de input HTML
                    $inputType = 'text';
                    if($type === 'number' || $type === 'currency' || $type === 'integer') $inputType = 'number';
                    if($type === 'date') $inputType = 'date';

                    $thAttrs = '';
                    if ($type === 'date') {
                        $thAttrs .= ' data-type="date"';
                        if ($dateFormat) {
                            $thAttrs .= ' data-format="' . e($dateFormat) . '"';
                        }
                    }
                @endphp

                <th{!! $thAttrs !!}>
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center justify-between group">
                            <span class="mr-2">{{ $label }}</span>
                            
                            {{-- Botão Lupa (Toggle do Input) --}}
                            <button type="button" 
                                    class="column-filter-toggle text-gray-400 hover:text-blue-600 focus:outline-none p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                                    data-col-index="{{ $index }}"
                                    title="Priorizar linhas por esta coluna">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>

                        {{-- Input de Filtro --}}
                        <div class="column-filter-container hidden mt-1" id="filter-container-{{ $tableId }}-{{ $index }}">
                            <input type="{{ $inputType }}" 
                                   class="column-filter-input w-full text-xs px-2 py-1 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                   placeholder="Buscar e Mover p/ Topo..."
                                   data-col-index="{{ $index }}"
                                   step="any">
                        </div>
                    </div>
                </th>
            @endforeach
        </tr>
    </thead>

    <tbody>
        @foreach ($rows as $row)
            <tr class="hover:bg-neutral-secondary-soft cursor-pointer transition-all duration-500">
                @foreach ($columns as $column)
                    @php
                        $key = $column['key'] ?? '';
                        $value = is_array($row) ? $row[$key] ?? null : (is_object($row) ? $row->{$key} ?? null : null);
                        $isFirst = $loop->first;
                    @endphp

                    <td class="{{ $isFirst ? 'font-medium text-heading whitespace-nowrap' : 'whitespace-nowrap' }}">
                        {{ $value }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

@once
    @push('scripts')
        <script>
            // --- Funções Auxiliares Globais ---
            window.baixarPDFTabela = function(headers, bodyData) {
                if (!window.jspdf) return alert("Biblioteca PDF carregando... tente novamente em instantes.");
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();
                doc.text("Relatório Exportado", 14, 15);
                doc.setFontSize(10);
                doc.text(`Gerado em: ${new Date().toLocaleDateString('pt-BR')}`, 14, 22);
                doc.autoTable({
                    head: [headers],
                    body: bodyData,
                    startY: 25,
                    theme: 'grid',
                    styles: { fontSize: 8 }
                });
                doc.save(`relatorio_${Date.now()}.pdf`);
            };

            window.toggleFilterTable = function(containerId, buttonId) {
                const container = document.getElementById(containerId);
                const button = document.getElementById(buttonId);
                if (!container || !button) return;
                container.classList.toggle('hidden');
                const isVisible = !container.classList.contains('hidden');
                if (isVisible) {
                    button.classList.add('bg-gray-100', 'dark:bg-gray-600', 'ring-2', 'ring-gray-200', 'dark:ring-gray-500');
                    button.classList.remove('bg-white', 'dark:bg-gray-700');
                } else {
                    button.classList.remove('bg-gray-100', 'dark:bg-gray-600', 'ring-2', 'ring-gray-200', 'dark:ring-gray-500');
                    button.classList.add('bg-white', 'dark:bg-gray-700');
                }
            };

            window.initExportReportTable = function(tableId, extraOptions = {}, rawData = {}) {
                const id = tableId || 'export-table';
                const tableEl = document.getElementById(id);

                if (!tableEl) return;
                if (!window.simpleDatatables || !window.simpleDatatables.DataTable) return;

                const baseLabels = {
                    placeholder: "Buscar...",
                    searchTitle: "Buscar na tabela",
                    pageTitle: "Página {page}",
                    perPage: "registros por página",
                    noRows: "Nenhum registro encontrado",
                    info: "Mostrando {start} até {end} de {rows} registros",
                    noResults: "Nenhum resultado corresponde à busca"
                };

                const labels = Object.assign({}, baseLabels, extraOptions.labels || {});
                const filterBtnId = 'filterButton_' + id;
                const filterContainerId = 'filterContainer_' + id;

                const dtOptions = Object.assign({},
                    extraOptions.datatable || {}, {
                        labels: labels,
                        template: (options, dom) =>
                            "<div class='" + options.classes.top + "'>" +
                            "<div class='flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 rtl:space-x-reverse w-full sm:w-auto'>" +
                            (options.paging && options.perPageSelect ?
                                "<div class='" + options.classes.dropdown + "'>" +
                                "<label>" +
                                "<select class='" + options.classes.selector + "'></select> " + options.labels.perPage +
                                "</label>" +
                                "</div>" : "") +
                            "<button id='exportDropdownButton' type='button' class='flex w-full sm:w-auto text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none'>" +
                            "Exportar" +
                            "<svg class='-me-0.5 ms-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'>" +
                            "<path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m19 9-7 7-7-7' />" +
                            "</svg>" +
                            "</button>" +
                            "<div id='exportDropdown' class='z-10 hidden w-52 divide-y divide-gray-100 rounded-lg bg-white shadow-sm dark:bg-gray-700' data-popper-placement='bottom'>" +
                            "<ul class='p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400' aria-labelledby='exportDropdownButton'>" +
                            "<li><button id='export-pdf' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'><svg class='me-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 24 24'><path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Zm.5 6a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V8Zm-3 0a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V8Zm6 0a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V8Z' clip-rule='evenodd'/></svg><span>Exportar PDF</span></button></li>" +
                            "<li><button id='export-csv' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'><svg class='me-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 24 24'><path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm1.018 8.828a2.34 2.34 0 0 0-2.373 2.13v.008a2.32 2.32 0 0 0 2.06 2.497l.535.059a.993.993 0 0 0 .136.006.272.272 0 0 1 .263.367l-.008.02a.377.377 0 0 1-.018.044.49.49 0 0 1-.078.02 1.689 1.689 0 0 1-.297.021h-1.13a1 1 0 1 0 0 2h1.13c.417 0 .892-.05 1.324-.279.47-.248.78-.648.953-1.134a2.272 2.272 0 0 0-2.115-3.06l-.478-.052a.32.32 0 0 1-.285-.341.34.34 0 0 1 .344-.306l.94.02a1 1 0 1 0 .043-2l-.943-.02h-.003Zm7.933 1.482a1 1 0 1 0-1.902-.62l-.57 1.747-.522-1.726a1 1 0 0 0-1.914.578l1.443 4.773a1 1 0 0 0 1.908.021l1.557-4.773Zm-13.762.88a.647.647 0 0 1 .458-.19h1.018a1 1 0 1 0 0-2H6.647A2.647 2.647 0 0 0 4 13.647v1.706A2.647 2.647 0 0 0 6.647 18h1.018a1 1 0 1 0 0-2H6.647A.647.647 0 0 1 6 15.353v-1.706c0-.172.068-.336.19-.457Z' clip-rule='evenodd'/></svg><span>Exportar CSV</span></button></li>" +
                            "<li><button id='export-json' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'><svg class='me-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 24 24'><path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Zm-.293 9.293a1 1 0 0 1 0 1.414L9.414 14l1.293 1.293a1 1 0 0 1-1.414 1.414l-2-2a1 1 0 0 1 0-1.414l2-2a1 1 0 0 1 1.414 0Zm2.586 1.414a1 1 0 0 1 1.414-1.414l2 2a1 1 0 0 1 0 1.414l-2 2a1 1 0 0 1-1.414-1.414L14.586 14l-1.293-1.293Z' clip-rule='evenodd'/></svg><span>Exportar JSON</span></button></li>" +
                            "<li><button id='export-txt' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'><svg class='me-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 24 24'><path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z' clip-rule='evenodd'/></svg><span>Exportar TXT</span></button></li>" +
                            "<li><button id='export-sql' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'><svg class='me-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 24 24'><path d='M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z'/></svg><span>Exportar SQL</span></button></li>" +
                            "</ul>" +
                            "</div>" +
                            "</div>" +
                            (options.searchable ?
                                "<div class='" + options.classes.search + " flex items-center gap-2'>" +
                                "<input class='" + options.classes.input + "' placeholder='" + options.labels.placeholder + "' type='search' title='" + options.labels.searchTitle + "'" + (dom.id ? " aria-controls='" + dom.id + "'" : "") + ">" +
                                "<button id='" + filterBtnId + "' type='button' class='flex w-full sm:w-auto text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none transition-colors duration-200'>" +
                                "<svg class='h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'>" +
                                "<path stroke='currentColor' stroke-linecap='round' stroke-width='2' d='M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z'/>" +
                                "</svg>" +
                                "<span class='sr-only'>Filtrar</span>" +
                                "</button>" +
                                "</div>" : ""
                            ) +
                            "</div>" +
                            // Filtro Global
                            "<div id='" + filterContainerId + "' class='hidden w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md p-4 mb-3 transition-all duration-300'>" +
                            "<div class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4'>" +
                             "<div><label class='block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1'>Data Início</label><input type='date' class='w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white'></div>" +
                             "<div><label class='block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1'>Data Fim</label><input type='date' class='w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white'></div>" +
                             "<div><label class='block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1'>Status</label><select class='w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white'><option>Todos</option><option>Ativo</option><option>Inativo</option></select></div>" +
                             "<div class='flex items-end'><button class='w-full dark:bg-blue-900 dark:hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-xs'>Aplicar Filtros</button></div>" +
                            "</div>" +
                            "</div>" +
                            "<div class='" + options.classes.container + "'" + (options.scrollY.length ?
                                " style='height: " + options.scrollY + "; overflow-Y: auto;'" : "") + "></div>" +
                            "<div class='" + options.classes.bottom + "'>" +
                            (options.paging ?
                                "<div class='" + options.classes.info + "'></div>" : ""
                            ) +
                            "<nav class='" + options.classes.pagination + "'></nav>" +
                            "</div>"
                    }
                );

                const table = new window.simpleDatatables.DataTable('#' + id, dtOptions);

                // --- LÓGICA DE REORDENAÇÃO DE LINHAS (PRIORIDADE NO TOPO) ---

                // 1. Toggle do Input
                document.querySelectorAll(`#${id} .column-filter-toggle`).forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.stopPropagation();
                        const colIndex = button.getAttribute('data-col-index');
                        const container = document.getElementById(`filter-container-${id}-${colIndex}`);
                        
                        if (container) {
                            container.classList.toggle('hidden');
                            if (!container.classList.contains('hidden')) {
                                const input = container.querySelector('input');
                                if (input) input.focus();
                            }
                        }
                    });
                });

                // 2. Prevenir ordenação de coluna ao clicar no container
                document.querySelectorAll(`#${id} .column-filter-container`).forEach(container => {
                    container.addEventListener('click', (e) => {
                        e.stopPropagation();
                    });
                });

                // 3. Ao teclar ENTER, Mover linhas para o topo
                document.querySelectorAll(`#${id} .column-filter-input`).forEach(input => {
                    input.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter') {
                            e.preventDefault(); 
                            
                            const val = input.value.trim().toLowerCase();
                            const colIndex = parseInt(input.getAttribute('data-col-index'));
                            
                            // Chama função de manipulação DOM das linhas
                            moveMatchesToTop(colIndex, val);
                        }
                    });
                });

                // Função Principal: Move linhas que deram Match para o início do TBODY
                function moveMatchesToTop(colIndex, term) {
                    const tableEl = document.getElementById(id);
                    const tbody = tableEl.querySelector('tbody');
                    const rows = Array.from(tbody.querySelectorAll('tr'));
                    
                    if(rows.length === 0) return;

                    const matches = [];
                    const others = [];

                    // Separa as linhas em dois grupos
                    rows.forEach(row => {
                        const cells = row.children;
                        const targetCell = cells[colIndex];
                        
                        if(targetCell) {
                            const text = targetCell.textContent.trim().toLowerCase();
                            // Verifica se contém o termo
                            if(term !== '' && text.includes(term)) {
                                matches.push(row);
                            } else {
                                others.push(row);
                            }
                        } else {
                            others.push(row);
                        }
                    });

                    // Se não houver termo de busca, ou nenhum match, restaura ordem original (ou mantém como está)
                    // Aqui, vamos apenas reconstruir o DOM: Matches Primeiro, Resto Depois.
                    
                    // Remove todas as linhas do DOM momentaneamente
                    // (O Fragmento ajuda na performance e evita reflow excessivo)
                    const fragment = document.createDocumentFragment();

                    // Adiciona os Matches primeiro (topo)
                    matches.forEach(r => {
                        // Opcional: Adicionar um highlight visual
                        r.classList.add('bg-blue-50', 'dark:bg-blue-900/20'); 
                        fragment.appendChild(r);
                    });

                    // Adiciona o restante depois
                    others.forEach(r => {
                        r.classList.remove('bg-blue-50', 'dark:bg-blue-900/20');
                        fragment.appendChild(r);
                    });

                    // Limpa o tbody e insere o fragmento reordenado
                    // Nota: Isso afeta apenas a página visível atual do SimpleDatatables
                    tbody.appendChild(fragment);
                    
                    // Importante: Como manipulamos o DOM diretamente, informamos à biblioteca
                    // que as colunas mudaram? Não, pois a biblioteca gerencia paginação.
                    // A alteração visual é imediata, mas ao mudar de página, a biblioteca
                    // pode restaurar a ordem original do JSON dela. 
                    // Para um "Painel", este comportamento visual imediato costuma ser o desejado.
                }

                // Drops e Botões Padrão
                const exportButton = document.getElementById("exportDropdownButton");
                const exportDropdownEl = document.getElementById("exportDropdown");
                if (window.Dropdown && exportButton && exportDropdownEl) {
                    new window.Dropdown(exportDropdownEl, exportButton);
                }

                const btnFilter = document.getElementById(filterBtnId);
                if (btnFilter) {
                    btnFilter.addEventListener('click', () => {
                        window.toggleFilterTable(filterContainerId, filterBtnId);
                    });
                }

                const btnPdf = document.getElementById("export-pdf");
                const btnCsv = document.getElementById("export-csv");
                const btnSql = document.getElementById("export-sql");
                const btnTxt = document.getElementById("export-txt");
                const btnJson = document.getElementById("export-json");

                if (btnPdf) btnPdf.addEventListener("click", () => {
                    const headerLabels = rawData.columns.map(col => col.label || col.key);
                    const bodyRows = rawData.rows.map(row => rawData.columns.map(col => row[col.key] ?? ''));
                    window.baixarPDFTabela(headerLabels, bodyRows);
                });
                if (btnCsv) btnCsv.addEventListener("click", () => window.simpleDatatables.exportCSV(table, { download: true, lineDelimiter: "\n", columnDelimiter: ";" }));
                if (btnSql) btnSql.addEventListener("click", () => window.simpleDatatables.exportSQL(table, { download: true, tableName: "export_table" }));
                if (btnTxt) btnTxt.addEventListener("click", () => window.simpleDatatables.exportTXT(table, { download: true }));
                if (btnJson) btnJson.addEventListener("click", () => window.simpleDatatables.exportJSON(table, { download: true, space: 3 }));
            };
        </script>
    @endpush
@endonce

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.initExportReportTable) {
                window.initExportReportTable(
                    @json($tableId),
                    @json([
                        'labels' => $labels,
                        'datatable' => $datatableOptions,
                    ]),
                    {
                        rows: @json($rows),
                        columns: @json($columns)
                    }
                );
            }
        });
    </script>
@endpush