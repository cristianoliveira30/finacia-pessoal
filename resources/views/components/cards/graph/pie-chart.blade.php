@props([
    'chartId' => 'pie-chart-' . uniqid(),
    'data' => [],
])

@php
    $labels = $data['categories'] ?? [];
    $rawSeries = $data['series'][0]['data'] ?? [];
    $customColors = $data['colors'] ?? null;
@endphp

<div class="w-full h-full flex flex-col bg-transparent rounded-xl p-2 overflow-hidden">
    <div id="{{ $chartId }}" class="flex-1 w-full min-h-0"></div>
</div>

@push('scripts')
    <script>
        (function() {
            const chartId = @json($chartId);
            const labels = @json($labels);
            const rawData = @json($rawSeries);
            const providedColors = @json($customColors);

            const series = (rawData || []).map(function(v) {
                if (typeof v === 'string') {
                    const parsed = parseFloat(v.replace(',', '.'));
                    return isNaN(parsed) ? 0 : parsed;
                }
                return v;
            });

            const defaultColors = [
                "#3b82f6", "#f59e0b", "#10b981", "#ef4444", "#8b5cf6", "#ec4899"
            ];

            const chartColors = providedColors && providedColors.length > 0 ? providedColors : defaultColors;

            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                const options = {
                    series: series,
                    labels: labels,
                    colors: chartColors,
                    chart: {
                        type: "donut",
                        height: "100%", 
                        width: "100%",
                        fontFamily: "Inter, sans-serif",
                        background: 'transparent',
                        animations: { enabled: true },
                        toolbar: { show: false },
                        parentHeightOffset: 0,
                        redrawOnParentResize: true,
                    },
                    grid: {
                        padding: {
                            top: -20,
                            bottom: 0, 
                            left: 0,
                            right: 0
                        }
                    },
                    stroke: {
                        show: true,
                        colors: ['#1e293b'],
                        width: 2 
                    },
                    plotOptions: {
                        pie: {
                            offsetY: 20, 
                            donut: {
                                size: '55%',
                                labels: {
                                    show: true,
                                    name: { show: false },
                                    value: { 
                                        show: true, 
                                        fontSize: '4vh',
                                        fontWeight: 800, 
                                        color: '#ffffff',
                                        offsetY: 10,
                                        formatter: function (val) { return val }
                                    },
                                    total: {
                                        show: true,
                                        showAlways: true,
                                        formatter: function (w) {
                                            return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                        }
                                    }
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function (val, opts) {
                            // CORREÇÃO: Removi a condição "if (percent < 12)". 
                            // Agora ele retorna o valor SEMPRE, não importa o tamanho.
                            return opts.w.config.series[opts.seriesIndex];
                        },
                        style: {
                            // CORREÇÃO: Estava 'px', coloquei '16px' para garantir que apareça
                            fontSize: '16px',
                            fontFamily: "Inter, sans-serif",
                            fontWeight: 'bold',
                            colors: ['#fff']
                        },
                        dropShadow: {
                            enabled: true, top: 1, left: 1, blur: 2, opacity: 0.8
                        }
                    },
                    legend: {
                        show: true,
                        position: "bottom",
                        floating: false,
                        fontSize: '14px',
                        fontWeight: 600,
                        labels: { colors: '#cbd5e1' },
                        markers: { width: 12, height: 12, radius: 12 },
                        itemMargin: { horizontal: 5, vertical: 5 },
                        formatter: function(seriesName, opts) {
                            return seriesName + ": " + opts.w.config.series[opts.seriesIndex]
                        }
                    },
                    tooltip: { 
                        enabled: true,
                        theme: 'dark',
                        y: { formatter: function(val) { return val; } }
                    }
                };

                const chart = new window.ApexCharts(el, options);
                chart.render();
            }

            function waitForApex() {
                if (window.ApexCharts) { initChart(); } else { setTimeout(waitForApex, 50); }
            }

            if (document.readyState === 'complete' || document.readyState === 'interactive') {
                waitForApex();
            } else {
                window.addEventListener('DOMContentLoaded', waitForApex);
            }
        })();
    </script>
@endpush