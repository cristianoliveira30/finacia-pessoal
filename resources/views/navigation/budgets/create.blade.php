<x-layouts.app :title="__('Orçamento Mensal')">

    <section class="min-h-screen bg-[#0f172a] py-12 font-sans selection:bg-blue-500 selection:text-white">
        <div class="w-full min-h-screen pt-2 px-4 sm:px-4 lg:pl-16 space-y-4 mb-5">

            @if (session('success'))
                <div class="align-middle flex justify-end">
                    <div class="flex items-start sm:items-center p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft"
                        role="alert">
                        <svg class="w-4 h-4 me-2 shrink-0 mt-0.5 sm:mt-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="align-middle flex justify-end">
                    <div class="flex items-start sm:items-center p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft"
                        role="alert">
                        <svg class="w-4 h-4 me-2 shrink-0 mt-0.5 sm:mt-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <form action="{{ route('budgets.store') }}" method="POST"> 
                @csrf
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                    <div>
                        <h1 class="text-3xl font-extrabold text-white tracking-tight">
                            Adicionar <span class="text-orange-500">Despesas</span>
                        </h1>
                        <p class="text-slate-400 mt-2 text-lg">
                            Gerencie suas previsões e gastos reais mensais.
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 cursor-pointer text-base font-medium text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg shadow-blue-900/50">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                </path>
                            </svg>
                            Salvar Alterações
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div
                        class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl shadow-sm hover:border-blue-500/50 transition duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <label class="text-sm font-medium text-slate-400 uppercase tracking-wider">Período</label>
                            <div class="p-2 bg-slate-700/50 rounded-lg text-blue-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <input type="month" name="month"
                            class="w-full bg-transparent border-none text-2xl font-bold text-white p-0 focus:ring-0 placeholder-slate-600 cursor-pointer">
                    </div>

                    <div
                        class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl shadow-sm hover:border-emerald-500/50 transition duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <label class="text-sm font-medium text-emerald-400 uppercase tracking-wider">Renda
                                Prevista</label>
                            <div class="p-2 bg-emerald-900/20 rounded-lg text-emerald-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-baseline">
                            <span class="text-2xl font-bold text-emerald-500 mr-1">R$</span>
                            <input type="text" inputmode="decimal" data-money autocomplete="off"
                                name="income_planned" id="income-planned-total" placeholder="0.00"
                                class="w-full bg-transparent border-none text-3xl font-bold text-emerald-500 p-0 focus:ring-0 placeholder-slate-600">
                        </div>
                    </div>

                    <div
                        class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl shadow-sm hover:border-blue-500/50 transition duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <label class="text-sm font-medium text-blue-400 uppercase tracking-wider">Renda
                                Realizada</label>
                            <div class="p-2 bg-blue-900/20 rounded-lg text-blue-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-baseline">
                            <span class="text-2xl font-bold text-blue-500 mr-1">R$</span>
                            <input type="text" inputmode="decimal" data-money autocomplete="off"name="income_actual"
                                id="income-actual-total" placeholder="0.00"
                                class="w-full bg-transparent border-none text-3xl font-bold p-0 focus:ring-0 placeholder-slate-600">
                        </div>
                    </div>
                </div>

                <div class="bg-slate-800 rounded-2xl shadow-xl border border-slate-700 overflow-hidden">
                    <div id="budget-accordion" data-accordion="collapse" class="divide-y divide-slate-700">

                        @php
                            // Dados estruturados com Ícones SVG para cada categoria
                            $areas = [
                                'Moradia' => [
                                    'icon' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>',
                                    'color' => 'text-purple-400',
                                    'items' => [
                                        'Aluguel',
                                        'Telefone',
                                        'Água',
                                        'Luz',
                                        'Internet',
                                        'Gás',
                                        'Igreja',
                                        'Manutenção ou Reparos',
                                    ],
                                ],
                                'Alimentação' => [
                                    'icon' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>',
                                    'color' => 'text-orange-400',
                                    'items' => ['Supermercado', 'Restaurante', 'Delivery', 'Café'],
                                ],
                                'Transporte' => [
                                    'icon' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>', // Exemplo genérico ou carro
                                    'color' => 'text-yellow-400',
                                    'items' => [
                                        'Uber',
                                        'Transporte Público',
                                        'Seguro',
                                        'Licenciamento',
                                        'Combustível',
                                        'Manutenção',
                                        'Estacionamento',
                                        'Impostos',
                                    ],
                                ],
                                'Entretenimento' => [
                                    'icon' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                                    'color' => 'text-pink-400',
                                    'items' => [
                                        'Streaming',
                                        'Cinema',
                                        'Viagens',
                                        'Teatro',
                                        'Shows',
                                        'Jogos',
                                        'Hobbies',
                                        'Produtos Online',
                                    ],
                                ],
                                'Saúde' => [
                                    'icon' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                                    'color' => 'text-red-400',
                                    'items' => ['Plano de Saúde', 'Medicamentos', 'Consultas', 'Suplementos'],
                                ],
                                'Educação' => [
                                    'icon' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
                                    'color' => 'text-cyan-400',
                                    'items' => ['Curso', 'Faculdade 01', 'Faculdade 02', 'Livros', 'Produtos'],
                                ],
                                'Pessoal' => [
                                    'icon' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>',
                                    'color' => 'text-indigo-400',
                                    'items' => ['Roupas', 'Academia', 'Cuidados pessoais'],
                                ],
                                'Outros' => [
                                    'icon' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>',
                                    'color' => 'text-gray-400',
                                    'items' => [
                                        'Cartão de Crédito 01',
                                        'Cartão de Crédito 02',
                                        'Imprevistos',
                                        'Assinaturas',
                                        'Diversos',
                                    ],
                                ],
                            ];
                        @endphp
                        @foreach ($areas as $areaName => $data)
                            <h2 id="heading-{{ $loop->index }}">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-6 text-left font-medium text-slate-300 hover:bg-slate-700/50 transition-colors focus:bg-slate-700/80 group"
                                    data-accordion-target="#body-{{ $loop->index }}"
                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="body-{{ $loop->index }}">

                                    <div class="flex items-center gap-4">
                                        <div
                                            class="p-2 bg-slate-700 rounded-lg {{ $data['color'] }} group-hover:scale-110 transition-transform">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                {!! $data['icon'] !!}
                                            </svg>
                                        </div>
                                        <span class="text-lg font-semibold text-white tracking-wide">
                                            {{ $areaName }}
                                        </span>
                                    </div>

                                    <svg data-accordion-icon
                                        class="w-5 h-5 shrink-0 transition-transform duration-300 group-hover:text-white"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </h2>

                            <div id="body-{{ $loop->index }}" class="hidden transition-all duration-300">
                                <div class="p-6 bg-slate-800/50 border-t border-slate-700">
                                    <div class="relative overflow-x-auto rounded-lg">
                                        <table class="w-full text-sm text-left text-slate-400">
                                            <thead
                                                class="text-xs text-slate-300 uppercase bg-slate-700/50 border-b border-slate-600">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4 font-bold">Item de Despesa
                                                    </th>
                                                    <th scope="col" class="px-6 py-4 w-1/4">Previsto (R$)</th>
                                                    <th scope="col" class="px-6 py-4 w-1/4">Realizado (R$)</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-slate-700/50"
                                                @if ($areaName === 'Outros') id="outros-tbody" @endif>
                                                @if ($areaName === 'Outros')
                                                    <div class="mt-0 mb-5 aligin-middle flex justify-end">
                                                        <button type="button" onclick="addOtherExpense()"
                                                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-lg shadow cursor-pointer">
                                                            + Adicionar novo item
                                                        </button>
                                                    </div>
                                                @endif
                                                @foreach ($data['items'] as $item)
                                                    <tr class="bg-transparent hover:bg-slate-700/30 transition-colors">
                                                        <td class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                            {{ $item }}
                                                        </td>
                                                        <td class="px-6 py-3">
                                                            <div class="relative">
                                                                <div
                                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                    <span class="text-gray-500">R$</span>
                                                                </div>
                                                                <input type="text" inputmode="decimal" data-money
                                                                    autocomplete="off"
                                                                    name="budget[{{ $areaName }}][{{ $item }}][planned]"
                                                                    class="bg-slate-900 border border-slate-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 placeholder-gray-600"
                                                                    placeholder="0.00">
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-3">
                                                            <div class="relative">
                                                                <div
                                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                    <span class="text-gray-500">R$</span>
                                                                </div>
                                                                <input type="text" inputmode="decimal" data-money
                                                                    autocomplete="off"
                                                                    name="budget[{{ $areaName }}][{{ $item }}][actual]"
                                                                    class="expense-actual bg-slate-900 border border-slate-600 text-white text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 p-2.5 placeholder-gray-600"
                                                                    placeholder="0.00">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </form>

        </div>
        @push('scripts')
            <script>
                function addOtherExpense() {
                    const itemName = prompt("Digite o nome da nova despesa:");

                    if (!itemName || itemName.trim() === '') return;

                    const tbody = document.querySelector('#outros-tbody');

                    const formattedName = itemName.trim();

                    const row = document.createElement('tr');
                    row.classList.add('bg-transparent', 'hover:bg-slate-700/30', 'transition-colors');

                    row.innerHTML = `
                        <td class="px-6 py-4 font-medium text-white whitespace-nowrap">
                            ${formattedName}
                        </td>

                        <td class="px-6 py-3">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500">R$</span>
                                </div>
                                <input type="text"
                                    inputmode="decimal"
                                    data-money
                                    name="budget[Outros][${formattedName}][planned]"
                                    class="money-input bg-slate-900 border border-slate-600 text-white text-sm rounded-lg block w-full pl-10 p-2.5"
                                    placeholder="0,00">
                            </div>
                        </td>

                        <td class="px-6 py-3">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500">R$</span>
                                </div>
                                <input type="text"
                                    inputmode="decimal"
                                    data-money
                                    autocomplete="off"
                                    name="budget[Outros][${formattedName}][actual]"
                                    class="expense-actual bg-slate-900 border border-slate-600 text-white text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 p-2.5"
                                    placeholder="0.00">
                            </div>
                        </td>
                    `;

                    tbody.appendChild(row);
                }

                function calculateActualIncome() {
                    let total = 0;

                    document.querySelectorAll('.expense-actual').forEach(input => {
                        const value = parseFloat(input.value);
                        if (!isNaN(value)) {
                            total += value;
                        }
                    });

                    const actualInput = document.getElementById('income-actual-total');
                    const plannedInput = document.getElementById('income-planned-total');

                    actualInput.value = total.toFixed(2);

                    const plannedValue = parseFloat(plannedInput.value);

                    // Remove estilos anteriores
                    actualInput.classList.remove('text-red-500', 'text-blue-500', 'border-red-500');

                    if (!isNaN(plannedValue) && total > plannedValue) {
                        actualInput.classList.add('text-red-500');
                        actualInput.classList.add('border-red-500');
                    } else {
                        actualInput.classList.add('text-blue-500');
                    }
                }

                function formatMoney(value) {
                    value = value.replace(/\D/g, '');

                    value = (parseInt(value || 0) / 100).toFixed(2) + '';

                    value = value.replace('.', ',');

                    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                    return value;
                }

                function unformatMoney(value) {
                    if (!value) return 0;

                    return parseFloat(
                        value.replace(/\./g, '')
                        .replace(',', '.')
                    ) || 0;
                }

                function applyMoneyMask(input) {
                    input.addEventListener('input', function() {
                        this.value = formatMoney(this.value);
                        calculateActualIncome();
                    });
                }

                function initializeMoneyInputs() {
                    document.querySelectorAll('[data-money]').forEach(input => {
                        applyMoneyMask(input);
                    });
                }

                function calculateActualIncome() {
                    let total = 0;

                    document.querySelectorAll('.expense-actual').forEach(input => {
                        total += unformatMoney(input.value);
                    });

                    const actualInput = document.getElementById('income-actual-total');
                    const plannedInput = document.getElementById('income-planned-total');

                    actualInput.value = formatMoney((total * 100).toString());

                    const plannedValue = unformatMoney(plannedInput.value);

                    actualInput.classList.remove('text-red-500', 'text-blue-500');

                    if (total > plannedValue) {
                        actualInput.classList.add('text-red-500');
                    } else {
                        actualInput.classList.add('text-blue-500');
                    }
                }

                document.addEventListener('input', function(e) {

                    if (e.target.classList.contains('expense-actual') ||
                        e.target.id === 'income-planned-total') {

                        calculateActualIncome();
                    }

                });

                document.addEventListener('DOMContentLoaded', function() {
                    calculateActualIncome();
                    initializeMoneyInputs();
                });
            </script>
        @endpush
    </section>

</x-layouts.app>
