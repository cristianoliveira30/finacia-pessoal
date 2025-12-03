@props([
    // Array de configuração
    'config' => [],
    // ID opcional do gráfico (útil se houver mais de um na tela)
    'chartId' => 'labels-chart-' . uniqid(),
])

@php
    // Valores do card
    $value = data_get($config, 'value', '12423');
    $valuePrefix = data_get($config, 'value_prefix', '$');
    $valueSuffix = data_get($config, 'value_suffix', '');
    $label = data_get($config, 'label', 'Sales this week');

    $variation = data_get($config, 'variation', '12'); // pode ser string ou número
    $variationSuffix = data_get($config, 'variation_suffix', '%');

    $rangeLabel = data_get($config, 'date_range_label', 'Last 7 days');
    $ranges = data_get($config, 'ranges', ['Yesterday', 'Today', 'Last 7 days', 'Last 30 days', 'Last 90 days']);

    $progressLabel = data_get($config, 'progress_label', 'Progress report');
    $progressUrl = data_get($config, 'progress_url', '#');

    // Dados do gráfico
    $categories = data_get($config, 'chart.categories', [
        '01 Feb',
        '02 Feb',
        '03 Feb',
        '04 Feb',
        '05 Feb',
        '06 Feb',
        '07 Feb',
    ]);

    $series = data_get($config, 'chart.series', [
        [
            'name' => 'Developer Edition',
            'data' => [150, 141, 145, 152, 135, 125, 160],
        ],
        [
            'name' => 'Designer Edition',
            'data' => [43, 13, 65, 12, 42, 73, 80],
        ],
    ]);
@endphp

<div
    class="max-w-sm w-full bg-neutral-primary-soft dark:bg-slate-900 border border-default rounded-base shadow-xs p-4 md:p-6">
    <div class="flex justify-between">
        <div>
            <h5 class="text-2xl font-bold text-heading dark:text-slate-100">
                {{ $valuePrefix }}{{ $value }}{{ $valueSuffix }}
            </h5>
            <p class="text-body">{{ $label }}</p>
        </div>

        <div class="flex items-center px-2.5 py-0.5 font-medium text-fg-success text-center">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6v13m0-13 4 4m-4-4-4 4" />
            </svg>
            {{ $variation }}{{ $variationSuffix }}
        </div>
    </div>

    {{-- Container do gráfico --}}
    <div id="{{ $chartId }}" class="py-4 md:py-6"></div>

    <div class="grid grid-cols-1 items-center border-light border-t justify-between">
        <div class="flex justify-between items-center pt-4 md:pt-6">
            <!-- Button -->
            <button id="{{ $chartId }}-button" data-dropdown-toggle="{{ $chartId }}-dropdown"
                data-dropdown-placement="bottom"
                class="text-sm font-medium text-body hover:text-heading dark:hover:text-slate-200 text-center inline-flex items-center"
                type="button">
                {{ $rangeLabel }}
                <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="{{ $chartId }}-dropdown"
                class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="{{ $chartId }}-button">
                    @foreach ($ranges as $range)
                        <li>
                            <a href="#"
                                class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                {{ $range }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <a href="{{ $progressUrl }}"
                class="inline-flex items-center text-fg-brand bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none">
                {{ $progressLabel }}
                <svg class="w-4 h-4 ms-1.5 -me-0.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        (function() {
            const chartId = @json($chartId);
            const categories = @json($categories);
            const series = @json($series);

            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                // Cores do tema
                const getBrandColor = () => {
                    const computedStyle = getComputedStyle(document.documentElement);
                    return computedStyle.getPropertyValue('--color-fg-brand').trim() || "#1447E6";
                };

                const getBrandSecondaryColor = () => {
                    const computedStyle = getComputedStyle(document.documentElement);
                    return computedStyle.getPropertyValue('--color-fg-brand-subtle').trim() || "#A5B4FC";
                };

                const brandColor = getBrandColor();
                const brandSecondaryColor = getBrandSecondaryColor();

                const options = {
                    xaxis: {
                        show: true,
                        categories: categories,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-body',
                            },
                        },
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        },
                    },
                    yaxis: {
                        show: true,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-body',
                            },
                            formatter: function(value) {
                                return 'R$ ' + value;
                            },
                        },
                    },
                    series: series,
                    chart: {
                        sparkline: {
                            enabled: false
                        },
                        height: 280, // 👈 altura fixa pra não sumir
                        width: "100%",
                        type: "area",
                        fontFamily: "Inter, sans-serif",
                        dropShadow: {
                            enabled: false
                        },
                        toolbar: {
                            show: false
                        },
                    },
                    colors: [brandColor, brandSecondaryColor],
                    tooltip: {
                        enabled: true,
                        x: {
                            show: false
                        },
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            opacityFrom: 0.55,
                            opacityTo: 0,
                            shade: brandColor,
                            gradientToColors: [brandColor],
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 3
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        show: false
                    },
                };

                const chart = new window.ApexCharts(el, options);
                chart.render();
            }

            function waitForApex() {
                if (window.ApexCharts) {
                    initChart();
                } else {
                    // 👇 tenta de novo até o ApexCharts ser carregado
                    setTimeout(waitForApex, 50);
                }
            }

            if (document.readyState === 'complete' || document.readyState === 'interactive') {
                waitForApex();
            } else {
                window.addEventListener('DOMContentLoaded', waitForApex);
            }
        })();
    </script>
@endpush