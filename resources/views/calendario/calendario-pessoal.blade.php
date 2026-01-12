<x-layouts.app :title="__('Agenda do Prefeito')">
    <div class="p-6">
        <div class="max-w-7xl mx-auto space-y-6">

            {{-- Cabeçalho da Agenda --}}
            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-center bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 dark:text-white flex items-center gap-3">
                        <x-bi-calendar-check class="w-8 h-8 text-indigo-600" />
                        Agenda Institucional
                    </h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">Gestão de compromissos e audiências do Gabinete.
                    </p>
                </div>

                <div class="flex gap-3 mt-4 md:mt-0">
                    {{-- NOVO: botão Mês --}}
                    <button id="btn-agenda-month" type="button"
                        class="px-4 py-2 bg-white hover:bg-slate-50 dark:bg-slate-900 dark:hover:bg-slate-700
                               text-slate-700 dark:text-white rounded-lg text-sm font-bold transition-colors
                               border border-slate-200 dark:border-slate-700">
                        Mês
                    </button>

                    <button id="btn-new-commitment" type="button"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-bold transition-colors flex items-center gap-2">
                        <x-bi-plus-lg /> Novo Compromisso
                    </button>

                </div>
            </div>

            {{-- ========================= --}}
            {{-- MODO LISTA (SEU LAYOUT)   --}}
            {{-- ========================= --}}
            <div id="agenda-list-view">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                    {{-- Coluna Lateral: Mini Calendário e Filtros --}}
                    <div class="lg:col-span-1 space-y-6">
                        <div
                            class="bg-white dark:bg-slate-800 p-4 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                            <h3 id="mini-month-title" class="font-bold text-slate-800 dark:text-white mb-4">Janeiro 2026
                            </h3>

                            {{-- Simulação de Mini Calendário --}}
                            <div id="mini-calendar-grid" class="grid grid-cols-7 gap-2 text-center text-xs">
                                <span class="text-slate-400 font-bold">D</span><span
                                    class="text-slate-400 font-bold">S</span><span
                                    class="text-slate-400 font-bold">T</span><span
                                    class="text-slate-400 font-bold">Q</span><span
                                    class="text-slate-400 font-bold">Q</span><span
                                    class="text-slate-400 font-bold">S</span><span
                                    class="text-slate-400 font-bold">S</span>

                                @for ($i = 1; $i <= 31; $i++)
                                    <button type="button" data-mini-day="{{ $i }}"
                                        class="p-2 rounded-md hover:bg-indigo-50 dark:hover:bg-slate-700 {{ $i == 12 ? 'bg-indigo-600 text-white' : 'text-slate-600 dark:text-slate-400' }}">
                                        {{ $i }}
                                    </button>
                                @endfor
                            </div>
                        </div>

                        <div
                            class="bg-white dark:bg-slate-800 p-4 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                            <h3 class="font-bold text-slate-800 dark:text-white mb-3 text-sm">Categorias</h3>
                            <div class="space-y-2 text-sm">
                                <label class="flex items-center gap-2"><input type="checkbox" checked
                                        class="rounded text-indigo-600"> Reuniões Externas</label>
                                <label class="flex items-center gap-2"><input type="checkbox" checked
                                        class="rounded text-emerald-600"> Saúde/Educação</label>
                                <label class="flex items-center gap-2"><input type="checkbox" checked
                                        class="rounded text-rose-600"> Eventos Oficiais</label>
                            </div>
                        </div>
                    </div>

                    {{-- Coluna Principal: Lista de Compromissos --}}
                    <div class="lg:col-span-3 space-y-4">

                        {{-- Dia de Hoje --}}
                        <div class="flex items-center gap-4 mb-2">
                            <span id="agenda-day-title" class="text-lg font-bold text-slate-800 dark:text-white">Hoje,
                                12 de Janeiro</span>
                            <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700"></div>
                        </div>

                        {{-- CONTAINER que o JS vai atualizar --}}
                        <div id="agenda-day-cards" class="space-y-4">
                            {{-- Card de Compromisso 1 --}}
                            <div
                                class="bg-white dark:bg-slate-800 p-5 rounded-xl shadow-sm border-l-4 border-indigo-500 border-y border-r border-slate-200 dark:border-slate-700 flex items-center justify-between group hover:shadow-md transition-shadow">
                                <div class="flex items-center gap-6">
                                    <div class="text-center min-w-[60px]">
                                        <span
                                            class="block text-lg font-bold text-slate-800 dark:text-white">09:00</span>
                                        <span class="text-xs text-slate-500 uppercase">10:30</span>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-800 dark:text-white group-hover:text-indigo-600 transition-colors">
                                            Reunião de Planejamento Estratégico</h4>
                                        <p class="text-sm text-slate-500 flex items-center gap-2 mt-1">
                                            <x-bi-geo-alt class="w-3 h-3" /> Sala de Atos - Gabinete
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span
                                        class="px-3 py-1 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-full text-xs font-bold">Secretariado</span>
                                    <button type="button"
                                        class="text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors">
                                        <x-bi-three-dots-vertical />
                                    </button>
                                </div>
                            </div>

                            {{-- Card de Compromisso 2 --}}
                            <div
                                class="bg-white dark:bg-slate-800 p-5 rounded-xl shadow-sm border-l-4 border-emerald-500 border-y border-r border-slate-200 dark:border-slate-700 flex items-center justify-between group hover:shadow-md transition-shadow">
                                <div class="flex items-center gap-6">
                                    <div class="text-center min-w-[60px]">
                                        <span
                                            class="block text-lg font-bold text-slate-800 dark:text-white">11:00</span>
                                        <span class="text-xs text-slate-500 uppercase">12:00</span>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-800 dark:text-white group-hover:text-emerald-600 transition-colors">
                                            Vistoria na Reforma da Escola Municipal Esperança</h4>
                                        <p class="text-sm text-slate-500 flex items-center gap-2 mt-1">
                                            <x-bi-geo-alt class="w-3 h-3" /> Bairro Vila Nova
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span
                                        class="px-3 py-1 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-full text-xs font-bold">Educação</span>
                                    <button type="button"
                                        class="text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors">
                                        <x-bi-three-dots-vertical />
                                    </button>
                                </div>
                            </div>

                            {{-- Intervalo / Almoço --}}
                            <div class="py-2 text-center text-xs text-slate-400 font-bold uppercase tracking-widest">
                                Intervalo para Almoço
                            </div>

                            {{-- Card de Compromisso 3 --}}
                            <div
                                class="bg-white dark:bg-slate-800 p-5 rounded-xl shadow-sm border-l-4 border-rose-500 border-y border-r border-slate-200 dark:border-slate-700 flex items-center justify-between group hover:shadow-md transition-shadow">
                                <div class="flex items-center gap-6">
                                    <div class="text-center min-w-[60px]">
                                        <span
                                            class="block text-lg font-bold text-slate-800 dark:text-white">14:00</span>
                                        <span class="text-xs text-slate-500 uppercase">16:00</span>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-800 dark:text-white group-hover:text-rose-600 transition-colors">
                                            Audiência Pública: Novo Plano Diretor</h4>
                                        <p class="text-sm text-slate-500 flex items-center gap-2 mt-1">
                                            <x-bi-geo-alt class="w-3 h-3" /> Câmara Municipal
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span
                                        class="px-3 py-1 bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 rounded-full text-xs font-bold">Legislativo</span>
                                    <button type="button"
                                        class="text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors">
                                        <x-bi-three-dots-vertical />
                                    </button>
                                </div>
                            </div>

                            {{-- Amanhã --}}
                            <div class="flex items-center gap-4 mt-8 mb-2">
                                <span class="text-lg font-bold text-slate-400 dark:text-slate-500">Amanhã, 13 de
                                    Janeiro</span>
                                <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700 opacity-50"></div>
                            </div>

                            {{-- Card de Compromisso Futuro --}}
                            <div
                                class="bg-white dark:bg-slate-800 p-5 rounded-xl shadow-sm border-l-4 border-slate-300 border-y border-r border-slate-200 dark:border-slate-700 flex items-center justify-between opacity-75 hover:opacity-100 transition-opacity">
                                <div class="flex items-center gap-6">
                                    <div class="text-center min-w-[60px]">
                                        <span
                                            class="block text-lg font-bold text-slate-800 dark:text-white">10:00</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-800 dark:text-white">Entrevista Rádio Local -
                                            Balanço
                                            Anual</h4>
                                        <p class="text-sm text-slate-500 mt-1 flex items-center gap-2"><x-bi-mic
                                                class="w-3 h-3" /> Estúdio Rádio FM 105.9</p>
                                    </div>
                                </div>
                                <span
                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-full text-xs font-bold">Imprensa</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- ========================= --}}
            {{-- MODO MÊS (CALENDÁRIO GRANDE) --}}
            {{-- ========================= --}}
            @php
                // Dados fake completos (01 a 31 de Janeiro/2026)
                $eventsByDate = [
                    '2026-01-01' => [
                        [
                            'start' => '08:00',
                            'end' => '09:00',
                            'title' => 'Cerimônia de Abertura do Ano Administrativo',
                            'location' => 'Praça Central',
                            'tag' => 'Evento',
                            'color' => 'rose',
                        ],
                        [
                            'start' => '10:30',
                            'end' => '11:30',
                            'title' => 'Reunião com Secretariado',
                            'location' => 'Sala de Atos - Gabinete',
                            'tag' => 'Secretariado',
                            'color' => 'indigo',
                        ],
                    ],
                    '2026-01-02' => [
                        [
                            'start' => '09:00',
                            'end' => '10:00',
                            'title' => 'Despachos Internos',
                            'location' => 'Gabinete',
                            'tag' => 'Gabinete',
                            'color' => 'slate',
                        ],
                        [
                            'start' => '15:00',
                            'end' => '16:00',
                            'title' => 'Visita Técnica: Obras do Mercado Municipal',
                            'location' => 'Centro',
                            'tag' => 'Obras',
                            'color' => 'amber',
                        ],
                    ],
                    '2026-01-03' => [
                        [
                            'start' => '09:30',
                            'end' => '10:30',
                            'title' => 'Reunião com Associação Comercial',
                            'location' => 'Auditório Municipal',
                            'tag' => 'Reunião',
                            'color' => 'indigo',
                        ],
                    ],
                    '2026-01-04' => [
                        [
                            'start' => '10:00',
                            'end' => '11:00',
                            'title' => 'Visita Institucional ao Hospital',
                            'location' => 'Hospital Municipal',
                            'tag' => 'Saúde',
                            'color' => 'emerald',
                        ],
                    ],
                    '2026-01-05' => [
                        [
                            'start' => '08:30',
                            'end' => '09:30',
                            'title' => 'Briefing de Segurança Pública',
                            'location' => 'Secretaria de Segurança',
                            'tag' => 'Segurança',
                            'color' => 'violet',
                        ],
                        [
                            'start' => '14:00',
                            'end' => '15:00',
                            'title' => 'Reunião: Plano de Mobilidade Urbana',
                            'location' => 'Sala de Reuniões',
                            'tag' => 'Planejamento',
                            'color' => 'amber',
                        ],
                    ],
                    '2026-01-06' => [
                        [
                            'start' => '09:00',
                            'end' => '10:30',
                            'title' => 'Reunião: Saúde e Educação (integração)',
                            'location' => 'Gabinete',
                            'tag' => 'Saúde/Educação',
                            'color' => 'emerald',
                        ],
                    ],
                    '2026-01-07' => [
                        [
                            'start' => '10:00',
                            'end' => '11:30',
                            'title' => 'Vistoria: Reforma de UBS',
                            'location' => 'Bairro São José',
                            'tag' => 'Saúde',
                            'color' => 'emerald',
                        ],
                        [
                            'start' => '15:30',
                            'end' => '16:30',
                            'title' => 'Audiência com Lideranças Comunitárias',
                            'location' => 'Centro Comunitário',
                            'tag' => 'Audiência',
                            'color' => 'indigo',
                        ],
                    ],
                    '2026-01-08' => [
                        [
                            'start' => '09:00',
                            'end' => '10:00',
                            'title' => 'Reunião: Contratos e Licitações',
                            'location' => 'Procuradoria',
                            'tag' => 'Jurídico',
                            'color' => 'slate',
                        ],
                    ],
                    '2026-01-09' => [
                        [
                            'start' => '08:00',
                            'end' => '09:00',
                            'title' => 'Entrevista Rádio Local',
                            'location' => 'Rádio FM 105.9',
                            'tag' => 'Imprensa',
                            'color' => 'slate',
                        ],
                        [
                            'start' => '11:00',
                            'end' => '12:00',
                            'title' => 'Reunião: Captação de Recursos',
                            'location' => 'Gabinete',
                            'tag' => 'Finanças',
                            'color' => 'indigo',
                        ],
                    ],
                    '2026-01-10' => [
                        [
                            'start' => '09:00',
                            'end' => '11:00',
                            'title' => 'Evento: Mutirão de Limpeza',
                            'location' => 'Bairro Vila Nova',
                            'tag' => 'Meio Ambiente',
                            'color' => 'emerald',
                        ],
                    ],
                    '2026-01-11' => [
                        [
                            'start' => '10:00',
                            'end' => '11:00',
                            'title' => 'Reunião: Agenda Cultural',
                            'location' => 'Secretaria de Cultura',
                            'tag' => 'Cultura',
                            'color' => 'violet',
                        ],
                    ],
                    '2026-01-12' => [
                        [
                            'start' => '09:00',
                            'end' => '10:30',
                            'title' => 'Reunião de Planejamento Estratégico',
                            'location' => 'Sala de Atos - Gabinete',
                            'tag' => 'Secretariado',
                            'color' => 'indigo',
                        ],
                        [
                            'start' => '11:00',
                            'end' => '12:00',
                            'title' => 'Vistoria na Reforma da Escola Municipal Esperança',
                            'location' => 'Bairro Vila Nova',
                            'tag' => 'Educação',
                            'color' => 'emerald',
                        ],
                        [
                            'start' => '14:00',
                            'end' => '16:00',
                            'title' => 'Audiência Pública: Novo Plano Diretor',
                            'location' => 'Câmara Municipal',
                            'tag' => 'Legislativo',
                            'color' => 'rose',
                        ],
                    ],
                    '2026-01-13' => [
                        [
                            'start' => '10:00',
                            'end' => '11:00',
                            'title' => 'Entrevista Rádio Local - Balanço Anual',
                            'location' => 'Estúdio Rádio FM 105.9',
                            'tag' => 'Imprensa',
                            'color' => 'slate',
                        ],
                        [
                            'start' => '15:00',
                            'end' => '16:00',
                            'title' => 'Reunião: Transporte Escolar',
                            'location' => 'Secretaria de Educação',
                            'tag' => 'Educação',
                            'color' => 'emerald',
                        ],
                    ],
                    '2026-01-14' => [
                        [
                            'start' => '09:00',
                            'end' => '10:00',
                            'title' => 'Reunião: Pauta com Vereadores',
                            'location' => 'Câmara Municipal',
                            'tag' => 'Legislativo',
                            'color' => 'rose',
                        ],
                    ],
                    '2026-01-15' => [
                        [
                            'start' => '08:30',
                            'end' => '09:30',
                            'title' => 'Despachos e Assinaturas',
                            'location' => 'Gabinete',
                            'tag' => 'Gabinete',
                            'color' => 'slate',
                        ],
                        [
                            'start' => '11:00',
                            'end' => '12:00',
                            'title' => 'Vistoria: Obras de Pavimentação',
                            'location' => 'Bairro Nova Esperança',
                            'tag' => 'Obras',
                            'color' => 'amber',
                        ],
                    ],
                    '2026-01-16' => [
                        [
                            'start' => '09:30',
                            'end' => '10:30',
                            'title' => 'Reunião: Prestação de Contas',
                            'location' => 'Secretaria de Finanças',
                            'tag' => 'Finanças',
                            'color' => 'indigo',
                        ],
                    ],
                    '2026-01-17' => [
                        [
                            'start' => '16:00',
                            'end' => '18:00',
                            'title' => 'Evento Oficial: Inauguração de Praça',
                            'location' => 'Bairro Primavera',
                            'tag' => 'Evento',
                            'color' => 'rose',
                        ],
                    ],
                    '2026-01-18' => [
                        [
                            'start' => '10:00',
                            'end' => '11:00',
                            'title' => 'Reunião: Esporte e Juventude',
                            'location' => 'Secretaria de Esporte',
                            'tag' => 'Esporte',
                            'color' => 'violet',
                        ],
                    ],
                    '2026-01-19' => [
                        [
                            'start' => '09:00',
                            'end' => '10:00',
                            'title' => 'Reunião: Ouvidoria e Demandas',
                            'location' => 'Ouvidoria Municipal',
                            'tag' => 'Ouvidoria',
                            'color' => 'violet',
                        ],
                        [
                            'start' => '14:30',
                            'end' => '15:30',
                            'title' => 'Visita: Centro de Assistência Social',
                            'location' => 'CRAS Centro',
                            'tag' => 'Assistência',
                            'color' => 'emerald',
                        ],
                    ],
                    '2026-01-20' => [
                        [
                            'start' => '08:00',
                            'end' => '09:00',
                            'title' => 'Alinhamento: Comunicação Institucional',
                            'location' => 'Assessoria',
                            'tag' => 'Imprensa',
                            'color' => 'slate',
                        ],
                    ],
                    '2026-01-21' => [
                        [
                            'start' => '10:00',
                            'end' => '11:30',
                            'title' => 'Reunião: Plano de Saneamento',
                            'location' => 'Sala de Reuniões',
                            'tag' => 'Planejamento',
                            'color' => 'amber',
                        ],
                    ],
                    '2026-01-22' => [
                        [
                            'start' => '09:00',
                            'end' => '10:00',
                            'title' => 'Reunião: Saúde (fila e atendimentos)',
                            'location' => 'Secretaria de Saúde',
                            'tag' => 'Saúde',
                            'color' => 'emerald',
                        ],
                    ],
                    '2026-01-23' => [
                        [
                            'start' => '11:00',
                            'end' => '12:00',
                            'title' => 'Reunião: Educação (infra e merenda)',
                            'location' => 'Secretaria de Educação',
                            'tag' => 'Educação',
                            'color' => 'emerald',
                        ],
                    ],
                    '2026-01-24' => [
                        [
                            'start' => '09:00',
                            'end' => '10:30',
                            'title' => 'Reunião com Lideranças Religiosas',
                            'location' => 'Gabinete',
                            'tag' => 'Audiência',
                            'color' => 'indigo',
                        ],
                    ],
                    '2026-01-25' => [
                        [
                            'start' => '16:00',
                            'end' => '17:30',
                            'title' => 'Evento: Ação Social no Bairro',
                            'location' => 'Bairro São Pedro',
                            'tag' => 'Assistência',
                            'color' => 'emerald',
                        ],
                    ],
                    '2026-01-26' => [
                        [
                            'start' => '08:30',
                            'end' => '09:30',
                            'title' => 'Despachos: Convênios',
                            'location' => 'Gabinete',
                            'tag' => 'Gabinete',
                            'color' => 'slate',
                        ],
                        [
                            'start' => '14:00',
                            'end' => '15:00',
                            'title' => 'Reunião: Obras (cronograma)',
                            'location' => 'Secretaria de Obras',
                            'tag' => 'Obras',
                            'color' => 'amber',
                        ],
                    ],
                    '2026-01-27' => [
                        [
                            'start' => '10:00',
                            'end' => '11:00',
                            'title' => 'Reunião: Segurança (operações)',
                            'location' => 'Secretaria de Segurança',
                            'tag' => 'Segurança',
                            'color' => 'violet',
                        ],
                    ],
                    '2026-01-28' => [
                        [
                            'start' => '09:00',
                            'end' => '10:00',
                            'title' => 'Reunião: Finanças (orçamento)',
                            'location' => 'Secretaria de Finanças',
                            'tag' => 'Finanças',
                            'color' => 'indigo',
                        ],
                        [
                            'start' => '15:00',
                            'end' => '16:00',
                            'title' => 'Audiência: Demandas do Setor Produtivo',
                            'location' => 'Auditório Municipal',
                            'tag' => 'Audiência',
                            'color' => 'indigo',
                        ],
                    ],
                    '2026-01-29' => [
                        [
                            'start' => '11:00',
                            'end' => '12:00',
                            'title' => 'Visita Técnica: Drenagem',
                            'location' => 'Bairro Alto',
                            'tag' => 'Obras',
                            'color' => 'amber',
                        ],
                    ],
                    '2026-01-30' => [
                        [
                            'start' => '09:00',
                            'end' => '10:00',
                            'title' => 'Reunião: Encerramento do Mês (indicadores)',
                            'location' => 'Gabinete',
                            'tag' => 'Gestão',
                            'color' => 'slate',
                        ],
                        [
                            'start' => '14:00',
                            'end' => '15:00',
                            'title' => 'Coletiva: Ações do Mês',
                            'location' => 'Sala de Imprensa',
                            'tag' => 'Imprensa',
                            'color' => 'slate',
                        ],
                    ],
                    '2026-01-31' => [
                        [
                            'start' => '10:00',
                            'end' => '12:00',
                            'title' => 'Evento Oficial: Feira do Produtor',
                            'location' => 'Praça Central',
                            'tag' => 'Evento',
                            'color' => 'rose',
                        ],
                    ],
                ];

                // Para o render inicial do Blade (fallback), simplifica por dia do mês:
                $monthEvents = [];
                foreach ($eventsByDate as $date => $events) {
                    $d = (int) substr($date, 8, 2);
                    foreach ($events as $e) {
                        $monthEvents[$d][] = ['time' => $e['start'], 'title' => $e['title'], 'color' => $e['color']];
                    }
                }

                // Render inicial (Janeiro/2026)
                $daysInMonth = 31;
                $leadingBlanks = 4; // Jan/2026 começa quinta
                $pill = [
                    'indigo' => 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-300',
                    'emerald' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300',
                    'rose' => 'bg-rose-50 text-rose-700 dark:bg-rose-900/30 dark:text-rose-300',
                    'amber' => 'bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300',
                    'violet' => 'bg-violet-50 text-violet-700 dark:bg-violet-900/30 dark:text-violet-300',
                    'slate' => 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-200',
                ];
                $tail = (7 - (($leadingBlanks + $daysInMonth) % 7)) % 7;
                $week = ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'];
            @endphp

            <div id="agenda-month-view" class="hidden">
                <div
                    class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                    <div class="flex items-center justify-between gap-3 mb-4">
                        <div>
                            <h2 id="month-title" class="text-xl font-bold text-slate-800 dark:text-white">Janeiro 2026
                            </h2>
                            <p id="month-subtitle" class="text-slate-500 dark:text-slate-400 text-sm">Visão mensal dos
                                compromissos.</p>
                        </div>

                        {{-- CONTROLES (JS) --}}
                        <div class="flex items-center gap-2">
                            <button id="btn-month-prev" type="button"
                                class="w-10 h-10 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-700
                                       text-slate-700 dark:text-white font-bold">
                                ‹
                            </button>

                            <select id="month-select"
                                class="h-10 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-white dark:bg-slate-900 text-slate-700 dark:text-white text-sm font-bold px-3">
                                {{-- options via JS --}}
                            </select>

                            <input id="year-input" type="number" min="2000" max="2100" value="2026"
                                class="h-10 w-24 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-white dark:bg-slate-900 text-slate-700 dark:text-white text-sm font-bold px-3" />

                            <button id="btn-month-next" type="button"
                                class="w-10 h-10 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-700
                                       text-slate-700 dark:text-white font-bold">
                                ›
                            </button>

                            {{-- botão Dia (voltar pra lista) --}}
                            <button id="btn-agenda-day" type="button"
                                class="px-4 py-2 bg-white hover:bg-slate-50 dark:bg-slate-900 dark:hover:bg-slate-700
                                       text-slate-700 dark:text-white rounded-lg text-sm font-bold transition-colors
                                       border border-slate-200 dark:border-slate-700">
                                Voltar
                            </button>
                        </div>
                    </div>

                    {{-- Cabeçalho da semana --}}
                    <div class="grid grid-cols-7 gap-2 text-center text-xs font-bold text-slate-400 mb-2">
                        @foreach ($week as $w)
                            <div>{{ $w }}</div>
                        @endforeach
                    </div>

                    {{-- Grade do mês (JS vai re-renderizar aqui) --}}
                    <div id="month-grid" class="grid grid-cols-7 gap-2">
                        {{-- espaços vazios antes do dia 1 --}}
                        @for ($i = 0; $i < $leadingBlanks; $i++)
                            <div
                                class="min-h-[110px] rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/40">
                            </div>
                        @endfor

                        {{-- dias --}}
                        @for ($day = 1; $day <= $daysInMonth; $day++)
                            @php
                                $events = $monthEvents[$day] ?? [];
                                $isToday = $day == 12;
                            @endphp

                            <div data-month-day="{{ $day }}"
                                class="min-h-[110px] rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-2 flex flex-col gap-2 {{ $isToday ? 'ring-2 ring-indigo-500/25' : '' }} cursor-pointer">
                                <div class="flex items-center justify-between">
                                    <span
                                        class="text-xs font-bold text-slate-800 dark:text-white">{{ $day }}</span>

                                    @if (count($events))
                                        <span class="text-[10px] font-bold text-slate-500 dark:text-slate-300">
                                            {{ count($events) }}
                                        </span>
                                    @endif
                                </div>

                                <div class="space-y-1">
                                    @foreach (array_slice($events, 0, 2) as $ev)
                                        <div
                                            class="truncate px-2 py-1 rounded-md text-[11px] font-bold {{ $pill[$ev['color']] ?? $pill['slate'] }}">
                                            <span class="opacity-80">{{ $ev['time'] }}</span> — {{ $ev['title'] }}
                                        </div>
                                    @endforeach

                                    @if (count($events) > 2)
                                        <div class="text-[11px] font-bold text-slate-500 dark:text-slate-300 px-2">
                                            +{{ count($events) - 2 }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endfor

                        {{-- espaços vazios no final --}}
                        @for ($i = 0; $i < $tail; $i++)
                            <div
                                class="min-h-[110px] rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/40">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- MODAL simples: Novo Compromisso --}}
    <div id="modal-new-commitment" class="hidden fixed inset-0 z-50">
        <div data-close-modal class="absolute inset-0 bg-black/40"></div>

        <div
            class="relative mx-auto mt-24 w-[92%] max-w-lg rounded-xl bg-white dark:bg-slate-800
                border border-slate-200 dark:border-slate-700 shadow-xl p-4">
            <div class="flex items-center justify-between">
                <h3 class="font-bold text-slate-800 dark:text-white">Novo Compromisso</h3>

                <button type="button" data-close-modal
                    class="w-9 h-9 inline-flex items-center justify-center rounded-lg
                       text-slate-500 hover:text-slate-900 hover:bg-slate-100
                       dark:text-slate-300 dark:hover:text-white dark:hover:bg-slate-700">
                    <x-bi-x-lg class="w-4 h-4" />
                </button>
            </div>

            <form id="form-new-commitment" class="mt-4 space-y-3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 mb-1">Data</label>
                        <input name="date" type="date"
                            class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900
                               text-slate-700 dark:text-white px-3 py-2 text-sm" />
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 mb-1">Hora</label>
                        <input name="time" type="time"
                            class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900
                               text-slate-700 dark:text-white px-3 py-2 text-sm" />
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 mb-1">Título</label>
                    <input name="title" type="text" placeholder="Ex: Reunião com secretariado"
                        class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900
                           text-slate-700 dark:text-white px-3 py-2 text-sm" />
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 mb-1">Local
                        (opcional)</label>
                    <input name="location" type="text" placeholder="Ex: Gabinete"
                        class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900
                           text-slate-700 dark:text-white px-3 py-2 text-sm" />
                </div>

                <div class="pt-2 flex items-center justify-end gap-2">
                    <button type="button" data-close-modal
                        class="px-4 py-2 rounded-lg text-sm font-bold border border-slate-200
                           text-slate-700 hover:bg-slate-50
                           dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-700">
                        Fechar
                    </button>

                    <button type="submit"
                        class="px-4 py-2 rounded-lg text-sm font-bold bg-indigo-600 hover:bg-indigo-700 text-white">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>

    @once
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const D = document;
                    const $ = (id) => D.getElementById(id);

                    // ====== ELEMENTOS ======
                    const btnMonth = $('btn-agenda-month');
                    const btnDay = $('btn-agenda-day');
                    const listView = $('agenda-list-view');
                    const monthView = $('agenda-month-view');

                    const miniTitle = $('mini-month-title');
                    const miniGrid = $('mini-calendar-grid');

                    const dayTitle = $('agenda-day-title');
                    const dayCards = $('agenda-day-cards');

                    const monthTitle = $('month-title');
                    const monthGrid = $('month-grid');

                    const monthSelect = $('month-select');
                    const yearInput = $('year-input');
                    const btnPrev = $('btn-month-prev');
                    const btnNext = $('btn-month-next');

                    // Modal
                    const btnNew = $('btn-new-commitment');
                    const modal = $('modal-new-commitment');
                    const form = $('form-new-commitment');

                    // Se algo essencial não existir, não quebra a página
                    if (!btnMonth || !btnDay || !listView || !monthView) return;

                    // ====== DADOS ======
                    const EVENTS = @json($eventsByDate);

                    const MONTHS = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto',
                        'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                    ];
                    const WEEK_HDR = `
    <span class="text-slate-400 font-bold">D</span>
    <span class="text-slate-400 font-bold">S</span>
    <span class="text-slate-400 font-bold">T</span>
    <span class="text-slate-400 font-bold">Q</span>
    <span class="text-slate-400 font-bold">Q</span>
    <span class="text-slate-400 font-bold">S</span>
    <span class="text-slate-400 font-bold">S</span>
  `;

                    const PILL = {
                        indigo: 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-300',
                        emerald: 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300',
                        rose: 'bg-rose-50 text-rose-700 dark:bg-rose-900/30 dark:text-rose-300',
                        amber: 'bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300',
                        violet: 'bg-violet-50 text-violet-700 dark:bg-violet-900/30 dark:text-violet-300',
                        slate: 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-200',
                    };

                    const BORDER = {
                        indigo: 'border-indigo-500',
                        emerald: 'border-emerald-500',
                        rose: 'border-rose-500',
                        amber: 'border-amber-500',
                        violet: 'border-violet-500',
                        slate: 'border-slate-300',
                    };

                    const TAGCLS = {
                        indigo: 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400',
                        emerald: 'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400',
                        rose: 'bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400',
                        amber: 'bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-300',
                        violet: 'bg-violet-50 dark:bg-violet-900/30 text-violet-600 dark:text-violet-300',
                        slate: 'bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300',
                    };

                    const pad2 = (n) => String(n).padStart(2, '0');
                    const keyOf = (y, m, d) => `${y}-${pad2(m+1)}-${pad2(d)}`;
                    const dim = (y, m) => new Date(y, m + 1, 0).getDate();
                    const dow1 = (y, m) => new Date(y, m, 1).getDay();
                    const esc = (s) => String(s ?? '')
                        .replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;')
                        .replaceAll('"', '&quot;').replaceAll("'", "&#039;");

                    // ====== ESTADO ======
                    let Y = 2026,
                        M = 0,
                        DAY = 12; // inicial Jan/2026 dia 12

                    // ====== VIEWS ======
                    const showMonth = () => {
                        listView.classList.add('hidden');
                        monthView.classList.remove('hidden');
                    };
                    const showDay = () => {
                        monthView.classList.add('hidden');
                        listView.classList.remove('hidden');
                    };

                    btnMonth.addEventListener('click', showMonth);
                    btnDay.addEventListener('click', showDay);

                    // ====== RENDER ======
                    function renderMini() {
                        if (!miniTitle || !miniGrid) return;
                        miniTitle.textContent = `${MONTHS[M]} ${Y}`;

                        const days = dim(Y, M);
                        let html = WEEK_HDR;

                        for (let d = 1; d <= days; d++) {
                            const active = d === DAY;
                            html += `
        <button type="button" data-mini-day="${d}"
          class="p-2 rounded-md hover:bg-indigo-50 dark:hover:bg-slate-700 ${active ? 'bg-indigo-600 text-white' : 'text-slate-600 dark:text-slate-400'}">
          ${d}
        </button>
      `;
                        }
                        miniGrid.innerHTML = html;
                    }

                    function renderDay() {
                        if (!dayTitle || !dayCards) return;

                        const isTodayFake = (Y === 2026 && M === 0 && DAY === 12);
                        dayTitle.textContent = `${isTodayFake ? 'Hoje, ' : ''}${DAY} de ${MONTHS[M]}`;

                        const k = keyOf(Y, M, DAY);
                        const items = Array.isArray(EVENTS[k]) ? EVENTS[k] : [];

                        if (!items.length) {
                            dayCards.innerHTML = `
        <div class="bg-white dark:bg-slate-800 p-5 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
          <div class="text-slate-600 dark:text-slate-300 font-bold">Sem compromissos para este dia.</div>
          <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Selecione outro dia no calendário.</div>
        </div>
      `;
                            return;
                        }

                        dayCards.innerHTML = items.map(ev => {
                            const c = ev.color || 'slate';
                            const border = BORDER[c] || BORDER.slate;
                            const tagCls = TAGCLS[c] || TAGCLS.slate;

                            const start = esc(ev.start || '');
                            const end = esc(ev.end || '');
                            const title = esc(ev.title || '');
                            const loc = esc(ev.location || '');
                            const tag = esc(ev.tag || '');

                            return `
        <div class="bg-white dark:bg-slate-800 p-5 rounded-xl shadow-sm border-l-4 ${border} border-y border-r border-slate-200 dark:border-slate-700 flex items-center justify-between group hover:shadow-md transition-shadow">
          <div class="flex items-center gap-6">
            <div class="text-center min-w-[60px]">
              <span class="block text-lg font-bold text-slate-800 dark:text-white">${start}</span>
              ${end ? `<span class="text-xs text-slate-500 uppercase">${end}</span>` : ``}
            </div>
            <div>
              <h4 class="font-bold text-slate-800 dark:text-white">${title}</h4>
              ${loc ? `<p class="text-sm text-slate-500 mt-1">📍 ${loc}</p>` : ``}
            </div>
          </div>
          <div class="flex items-center gap-3">
            ${tag ? `<span class="px-3 py-1 ${tagCls} rounded-full text-xs font-bold">${tag}</span>` : ``}
            <button type="button" class="text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors" aria-label="Mais opções">⋮</button>
          </div>
        </div>
      `;
                        }).join('');
                    }

                    function renderMonth() {
                        if (!monthTitle || !monthGrid) return;

                        monthTitle.textContent = `${MONTHS[M]} ${Y}`;
                        const days = dim(Y, M);
                        const lead = dow1(Y, M);
                        const tail = (7 - ((lead + days) % 7)) % 7;

                        const blank =
                            `<div class="min-h-[110px] rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/40"></div>`;
                        let html = '';

                        for (let i = 0; i < lead; i++) html += blank;

                        for (let d = 1; d <= days; d++) {
                            const k = keyOf(Y, M, d);
                            const items = Array.isArray(EVENTS[k]) ? EVENTS[k] : [];
                            const ring = (d === DAY) ? 'ring-2 ring-indigo-500/25' : '';

                            const list = items.slice(0, 2).map(ev => {
                                const cls = PILL[ev.color] || PILL.slate;
                                return `
          <div class="truncate px-2 py-1 rounded-md text-[11px] font-bold ${cls}">
            <span class="opacity-80">${esc(ev.start || '')}</span> — ${esc(ev.title || '')}
          </div>
        `;
                            }).join('');

                            const more = items.length > 2 ?
                                `<div class="text-[11px] font-bold text-slate-500 dark:text-slate-300 px-2">+${items.length - 2}</div>` :
                                '';

                            html += `
        <div data-month-day="${d}"
          class="min-h-[110px] rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-2 flex flex-col gap-2 cursor-pointer ${ring}">
          <div class="flex items-center justify-between">
            <span class="text-xs font-bold text-slate-800 dark:text-white">${d}</span>
            ${items.length ? `<span class="text-[10px] font-bold text-slate-500 dark:text-slate-300">${items.length}</span>` : ``}
          </div>
          <div class="space-y-1">${list}${more}</div>
        </div>
      `;
                        }

                        for (let i = 0; i < tail; i++) html += blank;
                        monthGrid.innerHTML = html;
                    }

                    function clampDay() {
                        const days = dim(Y, M);
                        if (DAY > days) DAY = days;
                        if (DAY < 1) DAY = 1;
                    }

                    function renderAll() {
                        clampDay();
                        renderMini();
                        renderMonth();
                        renderDay();
                    }

                    // ====== CONTROLES (MÊS/ANO) ======
                    if (monthSelect && yearInput) {
                        monthSelect.innerHTML = MONTHS.map((m, i) => `<option value="${i}">${m}</option>`).join('');
                        monthSelect.value = String(M);
                        yearInput.value = String(Y);

                        monthSelect.addEventListener('change', () => {
                            M = Number(monthSelect.value) || 0;
                            renderAll();
                        });
                        yearInput.addEventListener('change', () => {
                            Y = Number(yearInput.value) || Y;
                            renderAll();
                        });

                        btnPrev?.addEventListener('click', () => {
                            M--;
                            if (M < 0) {
                                M = 11;
                                Y--;
                            }
                            monthSelect.value = String(M);
                            yearInput.value = String(Y);
                            renderAll();
                        });

                        btnNext?.addEventListener('click', () => {
                            M++;
                            if (M > 11) {
                                M = 0;
                                Y++;
                            }
                            monthSelect.value = String(M);
                            yearInput.value = String(Y);
                            renderAll();
                        });
                    }

                    // ====== CLIQUES (DIAS) ======
                    miniGrid?.addEventListener('click', (e) => {
                        const b = e.target.closest('[data-mini-day]');
                        if (!b) return;
                        DAY = Number(b.dataset.miniDay) || DAY;
                        renderMini();
                        renderDay();
                    });

                    monthGrid?.addEventListener('click', (e) => {
                        const cell = e.target.closest('[data-month-day]');
                        if (!cell) return;
                        DAY = Number(cell.dataset.monthDay) || DAY;
                        renderAll();
                        showDay();
                    });

                    // ====== MODAL (NOVO COMPROMISSO) ======
                    if (btnNew && modal) {
                        const openModal = () => {
                            modal.classList.remove('hidden');
                            D.documentElement.classList.add('overflow-hidden');
                        };
                        const closeModal = () => {
                            modal.classList.add('hidden');
                            D.documentElement.classList.remove('overflow-hidden');
                        };

                        btnNew.addEventListener('click', openModal);

                        modal.addEventListener('click', (e) => {
                            if (e.target.closest('[data-close-modal]')) closeModal();
                        });

                        D.addEventListener('keydown', (e) => {
                            if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
                        });

                        form?.addEventListener('submit', (e) => {
                            e.preventDefault();
                            alert('Compromisso salvo (fake).');
                            form.reset();
                            closeModal();
                        });
                    }

                    // ====== START ======
                    renderAll();
                });
            </script>
        @endpush
    @endonce
</x-layouts.app>
