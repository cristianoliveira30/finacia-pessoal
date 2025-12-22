@props([
    'chartId' => 'pie-chart-' . uniqid(),
    'data' => [],
])

@php
    $labels = $data['categories'] ?? [];
    $rawSeries = $data['series'][0]['data'] ?? [];
    $customColors = $data['colors'] ?? null;
@endphp

{{-- 
    ALTERAÇÃO 1: Removi 'overflow-hidden' e adicionei 'p-2' (padding) extra no container.
    Isso evita que sombras ou pontas de letras sejam cortadas drasticamente.
--}}
<div class="w-full h-full flex flex-col items-center justify-center bg-transparent rounded-xl p-2">
    <div id="{{ $chartId }}" class="w-full flex-1" style="min-height: 300px;"></div>
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
                        // Redesenha o gráfico se a tela mudar de tamanho
                        redrawOnParentResize: true
                    },
                    // ALTERAÇÃO 2: Grid Padding
                    // Isso cria uma "margem de segurança" dentro do SVG para os textos grandes não serem cortados
                    grid: {
                        padding: {
                            top: 20,    // Espaço para não cortar o topo
                            bottom: 20, // Espaço perto da legenda
                            left: 20,   // Espaço lateral
                            right: 20
                        }
                    },
                    stroke: {
                        show: true,
                        colors: ['#1e293b'],
                        width: 4 
                    },
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            donut: {
                                size: '55%', // Ajuste fino para equilibrar rosca grossa x espaço interno
                                labels: {
                                    show: true,
                                    name: { show: false },
                                    value: { 
                                        show: true, 
                                        fontSize: '32px', // Mantido GIGANTE
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
                            return opts.w.config.series[opts.seriesIndex];
                        },
                        style: {
                            fontSize: '16px', // Mantido grande e legível
                            fontFamily: "Inter, sans-serif",
                            fontWeight: 'bold',
                            colors: ['#fff']
                        },
                        background: {
                            enabled: false, // Remove fundo quadrado atrás do número para visual mais limpo
                        },
                        dropShadow: {
                            enabled: true,
                            top: 1,
                            left: 1,
                            blur: 3,
                            color: '#000',
                            opacity: 0.9
                        }
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                        fontSize: '14px',
                        fontWeight: 500,
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