@props([
    'chartId' => 'labels-chart-' . uniqid(),
    'data' => [],
])

@php
    $categories = $data['categories'] ?? [];
    $series = $data['series'] ?? [];
@endphp

<div class="w-full bg-transparent">
    <div id="{{ $chartId }}"></div>
</div>

{{-- Passamos os dados para variáveis JS globais ao componente ANTES do push --}}
<script>
    // Usamos window para garantir que o script dentro do push consiga ler
    window.chartData_{{ str_replace('-', '_', $chartId) }} = {
        id: @json($chartId),
        categories: @json($categories),
        series: @json($series)
    };
</script>

@push('scripts')
    <script>
        (function() {
            // Recupera os dados da variável window criada acima
            const dataPath = window.chartData_{{ str_replace('-', '_', $chartId) }};
            const chartId = dataPath.id;
            const categories = dataPath.categories;
            const series = dataPath.series;

            function getThemeColors() {
                const html = document.documentElement;
                if (html.classList.contains('black')) {
                    return ["#4ADE80", "oklch(57.7% 0.245 27.325)"];
                } else if (html.classList.contains('dark')) {
                    return ["#F472B6", "#818CF8"]; 
                } else {
                    const computedStyle = getComputedStyle(document.documentElement);
                    const brand = computedStyle.getPropertyValue('--color-fg-brand').trim() || "#1447E6";
                    const secondary = computedStyle.getPropertyValue('--color-fg-brand-subtle').trim() || "#A5B4FC";
                    return [brand, secondary];
                }
            }

            function initChart() {
                const el = document.getElementById(chartId);
                if (!el || !window.ApexCharts) return;

                const initialColors = getThemeColors();

                const options = {
                    series: series,
                    chart: {
                        height: 290,
                        width: "100%",
                        type: "area",
                        fontFamily: "Inter, sans-serif",
                        toolbar: { show: false },
                    },
                    colors: initialColors,
                    xaxis: {
                        categories: categories,
                        labels: { style: { cssClass: 'text-xs font-normal fill-body' } }
                    },
                    yaxis: {
                        labels: {
                            formatter: (value) => 'R$ ' + value,
                            style: { cssClass: 'text-xs font-normal fill-body' }
                        }
                    },
                    fill: {
                        type: "gradient",
                        gradient: { opacityFrom: 0.55, opacityTo: 0, shadeIntensity: 1 }
                    },
                    stroke: { width: 3, curve: 'smooth' }
                };

                const chart = new window.ApexCharts(el, options);
                chart.render();

                // Validador de troca de tema
                const observer = new MutationObserver(() => {
                    const newColors = getThemeColors();
                    chart.updateOptions({
                        colors: newColors,
                        fill: { gradient: { gradientToColors: [newColors[0]] } }
                    });
                });

                observer.observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['class']
                });
            }

            if (window.ApexCharts) {
                initChart();
            } else {
                window.addEventListener('load', initChart);
            }
        })();
    </script>
@endpush