@props([
    'chartId' => 'pie-chart-' . uniqid(),
    'data' => [],
])

@php
    $labels = $data['categories'] ?? [];
    $rawSeries = $data['series'][0]['data'] ?? []; // primeira série
@endphp

<div class="w-full bg-neutral-primary-soft dark:bg-slate-900 rounded-xl">
    <div id="{{ $chartId }}"></div>
</div>

@push('scripts')
    <script>
        (function() {
            const chartId = @json($chartId);
            const labels = @json($labels);
            const rawData = @json($rawSeries);

            const series = (rawData || []).map(function(v) {
                if (typeof v === 'string') {
                    const parsed = parseFloat(v.replace(',', '.'));
                    return isNaN(parsed) ? 0 : parsed;
                }
                return v;
            });

            const warmColors = [
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
                    colors: warmColors,
                    chart: {
                        height: 225,
                        width: "100%",
                        type: "pie",
                        fontFamily: "Inter, sans-serif",
                    },
                    stroke: {
                        colors: ["#fff"], // neutral (slate-950)
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
                            return val.toFixed(1) + "%";
                        }
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
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
