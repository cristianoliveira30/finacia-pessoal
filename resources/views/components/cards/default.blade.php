@props([
    'id' => 'card-none',
    'title' => 'Relatório de alguma coisa',
    'chart' => [],
    'table' => []
])
<div class="block shadow-xs">
    {{-- header --}}
    <div class="bg-teal-600 text-stone-100 p-2 font-bold border border-default rounded-t-lg">
        {{ $title }}
    </div>

    {{-- main --}}
    <div class="bg-slate-100 text-center border border-default">
        <x-cards.graph.area-chart :data="$chart" :total="12423" :variation="12.0" />
    </div>

    {{-- footer --}}
    <div class="bg-slate-700 text-stone-100 p-2 border border-default flex justify-between rounded-b-lg">
        <!-- Dropdown menu -->
        @php
            $rangeLabel = 'Últimos 7 dias';
            $ranges = ['Hoje', 'Ontem', 'Últimos 7 dias', 'Últimos 30 dias'];
        @endphp
        <div class="flex justify-between items-center pl-2">
            <!-- Button -->
            <button id="{{ $id }}-button" data-dropdown-toggle="{{ $id }}-dropdown"
                data-dropdown-placement="bottom"
                class="text-sm font-medium text-slate-200 hover:text-slate-100 dark:hover:text-slate-200 text-center inline-flex items-center"
                type="button">
                {{ $rangeLabel }}
                <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="{{ $id }}-dropdown"
                class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="{{ $id }}-button">
                    @foreach ($ranges as $range)
                        <li>
                            <a href="#"
                                class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                {{ $range }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{-- donwload --}}
        <div class="inline-flex rounded-base shadow-xs -space-x-px" role="group">
            <button type="button"
                class="inline-flex items-center text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-3 focus:ring-neutral-tertiary-soft font-medium leading-5 rounded-s-base text-sm px-3 py-2 focus:outline-none"
                disabled>
                <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                </svg>
            </button>
            <button type="button"
                class="inline-flex items-center text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-3 focus:ring-neutral-tertiary-soft font-medium leading-5 text-sm px-3 py-2 focus:outline-none">
                <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                </svg>
            </button>
            <button id="dropdownOptions" data-dropdown-toggle="dropdown-options" type="button"
                class="text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-3 focus:ring-neutral-tertiary-soft font-medium leading-5 rounded-e-base text-sm px-3 py-2 focus:outline-none">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="3"
                        d="M6 12h.01m6 0h.01m5.99 0h.01" />
                </svg>
            </button>
            <div id="dropdown-options"
                class="z-10 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-40 block hidden">
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownOptions">
                    <li>
                        <a href="#"
                            class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Save
                            as PDF</a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Save
                            as doc</a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Save
                            as image</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
