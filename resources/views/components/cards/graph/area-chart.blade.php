@props([
    'chartId' => 'labels-chart-' . uniqid(),
    'data' => [],
])

<div class="w-full bg-neutral-primary-soft dark:bg-slate-900">
    {{-- Container do gráfico --}}
    <div id="{{ $chartId }}"></div>
</div>

@push('scripts')
    <script>
        (function() {
            const chartId = @json($chartId);
            const categories = @json($data['categories']);
            const series = @json($data['series']);

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
