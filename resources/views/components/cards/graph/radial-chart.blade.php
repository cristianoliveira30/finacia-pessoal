@props([
    'chartId' => 'radial-chart-' . uniqid(),
    // Espera o MESMO formato dos outros gráficos:
    // [
    //   'categories' => ['To do', 'In progress', 'Done'],
    //   'series' => [
    //      ['name' => 'Progresso', 'data' => [90, 85, 70]],
    //   ],
    // ]
    'data' => [],
])

@php
    // Lê categorias e primeira série de dados
    $labelsRaw = $data['categories'] ?? [];
    $seriesRaw = $data['series'][0]['data'] ?? [];

    // Normaliza para garantir números
    $labels = [];
    $series = [];

    foreach ($labelsRaw as $index => $label) {
        $labels[] = $label;

        $rawValue = $seriesRaw[$index] ?? 0;

        if (is_string($rawValue)) {
            $rawValue = (float) str_replace(',', '.', $rawValue);
        }

        $series[] = is_numeric($rawValue) ? (float) $rawValue : 0;
    }
@endphp
{{-- bg-neutral-primary-soft dark:bg-slate-900 --}}
<div class="w-full bg-transparent">
    <div id="{{ $chartId }}"></div>
</div>

@push('scripts')
    <script>
        (function() {
            const chartId = @json($chartId);
            const labels = @json($labels);
            const series = @json($series);

            function getBrandColor() {
                const computedStyle = getComputedStyle(document.documentElement);
                return computedStyle.getPropertyValue('--color-fg-brand').trim() || "#1447E6";
            }

            function getWarningColor() {
                const computedStyle = getComputedStyle(document.documentElement);
                return computedStyle.getPropertyValue('--color-warning').trim() || "#f59e0b";
            }

            function getSuccessColor() {
                const computedStyle = getComputedStyle(document.documentElement);
                return computedStyle.getPropertyValue('--color-success').trim() || "#22c55e";
            }

            function getNeutralSecondaryMediumColor() {
                const computedStyle = getComputedStyle(document.documentElement);
                return computedStyle.getPropertyValue('--color-neutral-secondary-medium').trim() || "#1f2937";
            }

            const brandColor = getBrandColor();
            const warningColor = getWarningColor();
            const successColor = getSuccessColor();
            const trackColor = getNeutralSecondaryMediumColor();

            // Paleta quente (pode usar mais ou menos cores que o número de séries)
            const colors = [
                "#005c81", // azul petróleo
                "#d40f60", // magenta forte
                "#f84339", // vermelho/laranja
                "#e79a32", // laranja queimado
                "#368986", // teal
            ];

            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                const options = {
                    series: series,
                    labels: labels,
                    colors: colors,
                    chart: {
                        height: 290,
                        width: "100%",
                        type: "radialBar",
                        sparkline: {
                            enabled: true,
                        },
                        fontFamily: "Inter, sans-serif",
                    },
                    plotOptions: {
                        radialBar: {
                            track: {
                                background: trackColor,
                            },
                            dataLabels: {
                                show: false,
                            },
                            hollow: {
                                margin: 0,
                                size: "32%",
                            }
                        },
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                            left: 0,
                            right: 0,
                            top: -10,
                            bottom: -10,
                        },
                    },
                    legend: {
                        show: true,
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    tooltip: {
                        enabled: true,
                        y: {
                            formatter: function(value) {
                                if (value == null || isNaN(value)) return "-";
                                return value.toFixed(1) + "%";
                            }
                        },
                        x: {
                            show: false,
                        },
                    },
                    yaxis: {
                        show: false,
                    }
                };

                const chart = new window.ApexCharts(el, options);
                chart.render();
            }

            function waitForApex() {
                if (window.ApexCharts) {
                    initChart();
                } else {
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
