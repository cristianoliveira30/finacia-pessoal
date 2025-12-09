@props([
    'chartId' => 'radial-chart-' . uniqid(),
    'data' => [], // ex: [['name' => 'To do', 'data' => [90]], ...]
])

@php
    // Normaliza: extrai labels e valores numéricos
    $labels = [];
    $series = [];

    foreach ($data ?? [] as $item) {
        $labels[] = $item['name'] ?? 'Item';

        $rawValue = $item['value'] ?? ($item['data'][0] ?? 0);

        if (is_string($rawValue)) {
            $rawValue = (float) str_replace(',', '.', $rawValue);
        }

        $series[] = is_numeric($rawValue) ? (float) $rawValue : 0;
    }
@endphp

<div class="w-full bg-neutral-primary-soft dark:bg-slate-900">
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

            // Se tiver mais de 3 séries, rotaciona as cores base
            const baseColors = [brandColor, warningColor, successColor];
            const colors = [
                "#005c81",
                "#d40f60",
                "#f84339",
                "#e79a32",
                "#368986",
            ];

            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                const options = {
                    series: series,
                    labels: labels,
                    colors: colors,
                    chart: {
                        height: 260,
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
