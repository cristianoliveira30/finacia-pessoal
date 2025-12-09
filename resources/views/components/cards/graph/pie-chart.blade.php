@props([
    'chartId' => 'pie-chart-' . uniqid(),
    'data' => [],
])

@php
    // Esperado para pizza:
    // $data = [
    //   'labels' => ['Direct', 'Organic', 'Referral'],
    //   'series' => [52.8, 26.8, 20.4],
    // ];

    $labels = data_get($data, 'labels', ['Direct', 'Organic search', 'Referrals']);
    $series = data_get($data, 'series', [52.8, 26.8, 20.4]);
@endphp

<div class="w-full bg-neutral-primary-soft dark:bg-slate-900">
    <div id="{{ $chartId }}"></div>
</div>

@push('scripts')
    <script>
        (function() {
            const chartId = @json($chartId);
            const labels = @json($labels);
            const rawSeries = @json($series);

            // Só mantendo o neutro pra borda
            function getNeutralPrimaryColor() {
                const computedStyle = getComputedStyle(document.documentElement);
                return computedStyle.getPropertyValue('--color-neutral-primary').trim() || "#020617"; // slate-950
            }

            const neutralPrimaryColor = getNeutralPrimaryColor();

            // Paleta quente (rosa, laranja, vermelho, roxo)
            const warmColors = [
                "#005c81",
                "#d40f60",
                "#f84339",
                "#e79a32",
                "#368986",
            ];

            const series = (rawSeries || []).map(function(v) {
                if (typeof v === 'string') {
                    const parsed = parseFloat(v.replace(',', '.'));
                    return isNaN(parsed) ? 0 : parsed;
                }
                return v;
            });

            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                const options = {
                    series: series,
                    labels: labels,
                    colors: warmColors,
                    chart: {
                        height: 225,
                        width: "100%",
                        type: "pie",
                        fontFamily: "Inter, sans-serif",
                    },
                    stroke: {
                        colors: [neutralPrimaryColor],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            size: "100%",
                            dataLabels: {
                                offset: -20,
                            },
                        },
                    },
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            fontSize: '12px',
                        },
                        formatter: function(val) {
                            // mostra valor em % com 1 casa
                            return val.toFixed(1) + "%";
                        }
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                        labels: {
                            colors: undefined,
                        },
                    },
                    tooltip: {
                        y: {
                            formatter: function(value) {
                                return value.toFixed(1) + "%";
                            }
                        }
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
