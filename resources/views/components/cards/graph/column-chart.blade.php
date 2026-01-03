@props([
    'chartId' => 'column-chart-' . uniqid(),
    'data' => [],
])

@php
    // Espera o mesmo formato:
    // [
    //   'categories' => ['Seg', 'Ter', ...],
    //   'series' => [
    //       ['name' => 'Organic', 'data' => [10, 20, ...]],
    //       ['name' => 'Social',  'data' => [5, 15, ...]],
    //   ],
    // ]
    $categories = $data['categories'] ?? [];
    $series = $data['series'] ?? [];
@endphp

<div class="w-full bg-neutral-primary-soft dark:bg-slate-900">
    <div id="{{ $chartId }}"></div>
</div>

@push('scripts')
    <script>
        (function() {
            const chartId = @json($chartId);
            const categories = @json($categories);
            const series = @json($series);

            function getBrandColor() {
                const computedStyle = getComputedStyle(document.documentElement);
                return computedStyle.getPropertyValue('--color-fg-brand').trim() || "#1447E6";
            }

            function getBrandSecondaryColor() {
                const computedStyle = getComputedStyle(document.documentElement);
                return computedStyle.getPropertyValue('--color-fg-brand-subtle').trim() || "#A5B4FC";
            }

            const brandColor = getBrandColor();
            const brandSecondaryColor = getBrandSecondaryColor();

            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                const options = {
                    series: series,
                    colors: [brandColor, brandSecondaryColor],
                    chart: {
                        type: "bar",
                        height: 290,
                        fontFamily: "Inter, sans-serif",
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: "55%",
                            borderRadiusApplication: "end",
                            borderRadius: 6,
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        width: 0,
                        colors: ["transparent"],
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                            left: 2,
                            right: 2,
                            top: 0,
                            bottom: 0,
                        },
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    xaxis: {
                        categories: categories,
                        floating: false,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-body',
                            },
                        },
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
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
                        },
                    },
                    legend: {
                        show: series.length > 1,
                        position: "top",
                        fontFamily: "Inter, sans-serif",
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
