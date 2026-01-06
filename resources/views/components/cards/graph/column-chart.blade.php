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
            const rawSeries = @json($series);
            const overlays = @json($data['overlays'] ?? []);

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

            function toNum(v) {
                const n = Number(v);
                return Number.isFinite(n) ? n : null;
            }

            function formatBRL(v, decimals = 2) {
                const n = Number(v);
                if (!Number.isFinite(n)) return String(v ?? "-");
                return "R$ " + n.toLocaleString("pt-BR", {
                    minimumFractionDigits: decimals,
                    maximumFractionDigits: decimals,
                });
            }

            function movingAverage(arr, period) {
                const p = Math.max(1, Number(period) || 1);
                const out = new Array(arr.length).fill(null);
                let sum = 0,
                    count = 0;

                for (let i = 0; i < arr.length; i++) {
                    const add = arr[i];
                    if (add != null) {
                        sum += add;
                        count++;
                    }

                    const j = i - p;
                    if (j >= 0) {
                        const sub = arr[j];
                        if (sub != null) {
                            sum -= sub;
                            count--;
                        }
                    }

                    if (i >= p - 1 && count > 0) out[i] = sum / count;
                }
                return out;
            }

            function trendline(arr) {
                const pts = [];
                for (let i = 0; i < arr.length; i++)
                    if (arr[i] != null) pts.push([i, arr[i]]);
                if (pts.length < 2) return new Array(arr.length).fill(null);

                let sumX = 0,
                    sumY = 0,
                    sumXY = 0,
                    sumXX = 0;
                for (const [x, y] of pts) {
                    sumX += x;
                    sumY += y;
                    sumXY += x * y;
                    sumXX += x * x;
                }

                const n = pts.length;
                const denom = (n * sumXX - sumX * sumX);
                if (!denom) return new Array(arr.length).fill(null);

                const b = (n * sumXY - sumX * sumY) / denom;
                const a = (sumY - b * sumX) / n;

                return arr.map((_, i) => a + b * i);
            }

            function buildSeriesWithOverlays(baseSeries) {
                const cfgMA = overlays?.movingAverage || overlays?.moving_average;
                const cfgTR = overlays?.trendline || overlays?.trend;

                const maEnabled = !!cfgMA?.enabled;
                const trEnabled = !!cfgTR?.enabled;

                const out = baseSeries.map(s => ({
                    ...s,
                    type: "column"
                }));

                if (!maEnabled && !trEnabled) return out;

                const pickIndex = (idx) => Math.max(0, Math.min(baseSeries.length - 1, idx));

                if (maEnabled) {
                    const idx = pickIndex(Number(cfgMA?.seriesIndex) ?? 0);
                    const period = Number(cfgMA?.period) || 3;
                    const base = (baseSeries[idx]?.data || []).map(toNum);

                    out.push({
                        name: cfgMA?.name || `Média móvel (${period})`,
                        type: "line",
                        data: movingAverage(base, period),
                    });
                }

                if (trEnabled) {
                    const idx = pickIndex(Number(cfgTR?.seriesIndex) ?? 0);
                    const base = (baseSeries[idx]?.data || []).map(toNum);

                    out.push({
                        name: cfgTR?.name || "Tendência",
                        type: "line",
                        data: trendline(base),
                    });
                }

                return out;
            }

            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                const baseSeries = (rawSeries || []);
                const series = buildSeriesWithOverlays(baseSeries);

                const baseColors = [brandColor, brandSecondaryColor];
                const maColor = (overlays?.movingAverage?.color || overlays?.moving_average?.color || "#0EA5E9");
                const trColor = (overlays?.trendline?.color || overlays?.trend?.color || "#64748B");

                // cores: 1a e 2a séries = colunas, extras = linhas
                const colors = [
                    ...baseColors,
                    ...(overlays?.movingAverage?.enabled || overlays?.moving_average?.enabled ? [maColor] : []),
                    ...(overlays?.trendline?.enabled || overlays?.trend?.enabled ? [trColor] : []),
                ];

                const strokeWidths = series.map(s => (s.type === "column" ? 0 : 3));
                const markerSizes = series.map(s => (s.type === "column" ? 0 : 3));

                const options = {
                    series,
                    colors,
                    chart: {
                        type: "line", // <- habilita combo column + line
                        height: 290,
                        fontFamily: "Inter, sans-serif",
                        toolbar: {
                            show: false
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
                    stroke: {
                        show: true,
                        width: strokeWidths,
                        curve: "straight",
                    },
                    markers: {
                        size: markerSizes,
                    },
                    dataLabels: {
                        enabled: false
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                            left: 2,
                            right: 2,
                            top: 0,
                            bottom: 0
                        },
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        style: {
                            fontFamily: "Inter, sans-serif"
                        },
                        y: {
                            formatter: (val) => {
                                if (val == null || isNaN(val)) return "-";
                                return formatBRL(val, 2);
                            }
                        }
                    },
                    xaxis: {
                        categories,
                        floating: false,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-body'
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
                                cssClass: 'text-xs font-normal fill-body'
                            },
                            formatter: (val) => {
                                if (val == null || isNaN(val)) return "-";
                                return formatBRL(val, 0);
                            }
                        },
                    },
                    legend: {
                        show: series.length > 1,
                        position: "top",
                        fontFamily: "Inter, sans-serif",
                    },
                    fill: {
                        opacity: 1
                    },
                    states: {
                        hover: {
                            filter: {
                                type: "darken",
                                value: 0.95
                            }
                        },
                    },
                };

                const chart = new window.ApexCharts(el, options);
                chart.render();
            }

            function waitForApex() {
                if (window.ApexCharts) initChart();
                else setTimeout(waitForApex, 50);
            }

            if (document.readyState === 'complete' || document.readyState === 'interactive') waitForApex();
            else window.addEventListener('DOMContentLoaded', waitForApex);
        })();
    </script>
@endpush
