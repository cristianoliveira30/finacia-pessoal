@props([
  'chartId' => null,
  'data' => [],
])

@php
  $chartId = $chartId ?: ('column-chart-' . uniqid());
  $categories = $data['categories'] ?? [];
  $series = $data['series'] ?? [];
@endphp
{{-- dark:bg-slate-900 bg-neutral-primary-soft --}}
<div class="w-full bg-transparent ">
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

            function buildSeries(mode) {
                const base = (rawSeries || []).map(s => ({
                    ...s,
                    type: "column"
                }));

                const cfgMA = overlays?.movingAverage || overlays?.moving_average;
                const cfgTR = overlays?.trendline || overlays?.trend;

                const maEnabled = !!cfgMA?.enabled;
                const trEnabled = !!cfgTR?.enabled;

                const pickIndex = (idx) => Math.max(0, Math.min((rawSeries?.length || 1) - 1, idx));

                if (mode === "movingAverage" && maEnabled) {
                    const idx = pickIndex(Number(cfgMA?.seriesIndex) ?? 0);
                    const period = Number(cfgMA?.period) || 3;
                    const baseData = (rawSeries[idx]?.data || []).map(toNum);
                    base.push({
                        name: cfgMA?.name || `Média móvel (${period})`,
                        type: "line",
                        data: movingAverage(baseData, period)
                    });
                }

                if (mode === "trendline" && trEnabled) {
                    const idx = pickIndex(Number(cfgTR?.seriesIndex) ?? 0);
                    const baseData = (rawSeries[idx]?.data || []).map(toNum);
                    base.push({
                        name: cfgTR?.name || "Tendência",
                        type: "line",
                        data: trendline(baseData)
                    });
                }

                return base;
            }

            function buildColors(mode) {
                const base = [brandColor, brandSecondaryColor];

                const cfgMA = overlays?.movingAverage || overlays?.moving_average;
                const cfgTR = overlays?.trendline || overlays?.trend;

                const maColor = cfgMA?.color || "#0EA5E9";
                const trColor = cfgTR?.color || "#64748B";

                if (mode === "movingAverage" && cfgMA?.enabled) base.push(maColor);
                if (mode === "trendline" && cfgTR?.enabled) base.push(trColor);

                return base;
            }

            function strokeWidths(series) {
                return series.map(s => (s.type === "column" ? 0 : 3));
            }

            function markerSizes(series) {
                return series.map(s => (s.type === "column" ? 0 : 3));
            }

            function formatAxis(val) {
                const n = Number(val);
                if (!Number.isFinite(n)) return "";

                const abs = Math.abs(n);
                const fmt = (x) => x.toLocaleString("pt-BR", { maximumFractionDigits: 1 });

                if (abs >= 1e9) return `${fmt(n / 1e9)} bi`;
                if (abs >= 1e6) return `${fmt(n / 1e6)} mi`;
                if (abs >= 1e3) return `${fmt(n / 1e3)} mil`;
                return fmt(n);
            }


            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                // começa do jeito que o card mandar (o default lá)
                let currentMode = "movingAverage";

                const series = buildSeries(currentMode);
                const colors = buildColors(currentMode);

                const options = {
                    series,
                    colors,
                    chart: {
                        type: "line", // combo
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
                        width: strokeWidths(series),
                        curve: "straight"
                    },
                    markers: {
                        size: markerSizes(series)
                    },
                    dataLabels: {
                        enabled: false
                    },
                    grid: {
                        show: false
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        style: { fontFamily: "Inter, sans-serif" },
                        y: { formatter: (v) => formatAxis(v) }
                    },
                    xaxis: {
                        categories,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-body'
                            }
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
                        tickAmount: 5,
                        decimalsInFloat: 1,
                        labels: {
                            show: true,
                            formatter: formatAxis,
                            offsetX: -6,
                            style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: "text-xs font-normal fill-body",
                            },
                        },
                    },
                    legend: {
                        show: true,
                        position: "top",
                        fontFamily: "Inter, sans-serif"
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
                        }
                    },
                };

                const chart = new window.ApexCharts(el, options);
                chart.render();

                // expõe instância por id (opcional, mas útil)
                window.__APEX_CHARTS__ = window.__APEX_CHARTS__ || {};
                window.__APEX_CHARTS__[chartId] = chart;

                // escuta o "emit"
                window.addEventListener("chart:overlay", (e) => {
                    const d = e?.detail || {};
                    if (d.chartId !== chartId) return;

                    const mode = d.mode || "none";
                    currentMode = mode;

                    const nextSeries = buildSeries(mode);
                    const nextColors = buildColors(mode);

                    chart.updateOptions({
                        series: nextSeries,
                        colors: nextColors,
                        stroke: {
                            width: strokeWidths(nextSeries),
                            curve: "straight"
                        },
                        markers: {
                            size: markerSizes(nextSeries)
                        },
                    }, true, true);
                });
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
