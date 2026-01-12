@props([
    'chartId' => 'bar-chart-' . uniqid(),
    'data' => [],
])

@php
    // Espera o formato:
    // [
    //   'categories' => ['Jul', 'Aug', 'Sep', ...],
    //   'series' => [
    //      ['name' => 'Income',  'data' => [1420, 1620, ...]],
    //      ['name' => 'Expense', 'data' => [788, 810, ...]],
    //   ],
    // ]
    $categories = $data['categories'] ?? [];
    $series = $data['series'] ?? [];
@endphp
{{-- bg-neutral-primary-soft dark:bg-slate-900 --}}
<div class="w-full bg-transparent"> 
    <div id="{{ $chartId }}"></div>
</div>

@push('scripts')
    <script>
        (function() {
            const chartId = @json($chartId);
            const categories = @json($categories);
            const rawSeries = @json($series);

            // Cores padrão para receita / despesa
            const incomeColor = "#007A55"; // verde (tailwind emerald-600 vibe)
            const expenseColor = "#C70036"; // vermelho (tailwind red-600 vibe)

            // Se quiser, dá pra permitir cores vindas do backend:
            const series = (rawSeries || []).map(function(serie, index) {
                return Object.assign({}, serie, {
                    color: serie.color || (index === 0 ? incomeColor : expenseColor),
                });
            });

            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                const options = {
                    series: series,
                    chart: {
                        sparkline: {
                            enabled: false,
                        },
                        type: "bar",
                        width: "100%",
                        height: 290,
                        toolbar: {
                            show: false,
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            columnWidth: "100%",
                            borderRadiusApplication: "end",
                            borderRadius: 6,
                            dataLabels: {
                                position: "top",
                            },
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: series.length > 0,
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                        y: {
                            formatter: function(value) {
                                if (value == null || isNaN(value)) return "-";
                                return "R$ " + value.toLocaleString('pt-BR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2,
                                });
                            }
                        }
                    },
                    xaxis: {
                        categories: categories,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-body'
                            },
                            formatter: function(value) {
                                if (value == null || isNaN(value)) return value;
                                return "R$ " + value;
                            }
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                    yaxis: {
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-body'
                            }
                        }
                    },
                    grid: {
                        show: true,
                        strokeDashArray: 4,
                        padding: {
                            left: 2,
                            right: 2,
                            top: -10,
                            bottom: 0,
                        },
                    },
                    fill: {
                        opacity: 1,
                    },
                    states: {
                        hover: {
                            filter: {
                                type: "darken",
                                value: 0.95,
                            },
                        },
                    },
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
