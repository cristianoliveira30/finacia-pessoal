@props([
    'chartId' => 'labels-chart-' . uniqid(),
    'data' => [],
    'total' => null,
    'variation' => null,
])

<div class="w-full bg-neutral-primary-soft dark:bg-slate-900">
    @if ($total && $variation)
        <div class="flex justify-between p-2">
            <div>
                <h5 class="text-md font-bold text-heading dark:text-slate-100">
                    R$ {{ $total }}
                </h5>
            </div>

            <div class="flex items-center font-medium text-fg-success text-center">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v13m0-13 4 4m-4-4-4 4" />
                </svg>
                {{ $variation }} %
            </div>
        </div>
    @endif

    {{-- Container do gráfico --}}
    <div id="{{ $chartId }}"></div>
</div>

@php
    // Dados para o gráfico
    $categories = data_get($data, 'categories', [
        '01 No Data',
        '02 No Data',
        '03 No Data',
        '04 No Data',
        '05 No Data',
        '06 No Data',
        '07 No Data',
    ]);

    $series = data_get($data, 'series', [
        [
            'name' => 'Sem Dados',
            'data' => [150, 141, 145, 152, 135, 125, 160],
        ],
        [
            'name' => 'Sem Dados',
            'data' => [43, 13, 65, 12, 42, 73, 80],
        ],
    ]);
@endphp

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
                        height: 210, // 👈 altura fixa pra não sumir
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
