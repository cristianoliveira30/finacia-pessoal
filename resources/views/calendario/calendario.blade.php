<x-layouts.app :title="__('Calendario Prefeito')">
    <div class="min-h-screen bg-gray-900 text-white font-sans p-6">

        <div class="max-w-6xl mx-auto w-full">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">

                <div class="flex items-center gap-4 w-full md:w-auto">
                    <div class="flex rounded-lg bg-gray-800 border border-gray-700">
                        <button
                            class="p-2 hover:bg-gray-700 text-gray-400 hover:text-white rounded-l-lg border-r border-gray-700 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button class="p-2 hover:bg-gray-700 text-gray-400 hover:text-white rounded-r-lg transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <h1 class="text-xl md:text-2xl font-bold text-white whitespace-nowrap">Dezembro 2025</h1>

                    <button
                        class="hidden sm:block px-4 py-2 text-sm font-medium text-gray-300 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 hover:text-white transition">
                        hoje
                    </button>
                </div>

                <div class="flex flex-wrap items-center gap-3 w-full md:w-auto justify-end">

                    <div class="flex bg-gray-800 rounded-lg p-1 border border-gray-700">
                        <button
                            class="px-4 py-1.5 text-sm font-medium text-white bg-gray-700 rounded shadow-sm transition">mês</button>
                        <button
                            class="px-4 py-1.5 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-700 rounded transition">semana</button>
                        <button
                            class="px-4 py-1.5 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-700 rounded transition">dia</button>
                        <button
                            class="px-4 py-1.5 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-700 rounded transition">lista</button>
                    </div>

                    <button
                        class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg transition shadow-lg shadow-blue-600/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Novo Evento
                    </button>
                </div>
            </div>

            <div class="bg-gray-800 border border-gray-700 rounded-lg overflow-hidden shadow-xl">

                <div class="grid grid-cols-7 border-b border-gray-700 bg-gray-800">
                    <div class="py-3 text-center text-sm font-semibold text-gray-300">Dom</div>
                    <div class="py-3 text-center text-sm font-semibold text-gray-300">Seg</div>
                    <div class="py-3 text-center text-sm font-semibold text-gray-300">Ter</div>
                    <div class="py-3 text-center text-sm font-semibold text-gray-300">Qua</div>
                    <div class="py-3 text-center text-sm font-semibold text-gray-300">Qui</div>
                    <div class="py-3 text-center text-sm font-semibold text-gray-300">Sex</div>
                    <div class="py-3 text-center text-sm font-semibold text-gray-300">Sab</div>
                </div>

                <div class="grid grid-cols-7 bg-gray-700 gap-px">

                    <div class="min-h-[140px] bg-gray-900 p-2 relative">
                        <span class="text-gray-500 font-medium text-sm">30</span>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">1</span>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">2</span>
                        <div class="mt-2 w-full">
                            <button
                                class="w-full text-left px-2 py-1 mb-1 rounded bg-indigo-900/50 border border-indigo-500/30 text-indigo-200 text-xs font-medium hover:bg-indigo-800 hover:border-indigo-400 transition truncate">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 inline-block mr-1"></span>
                                Digital Art Showcase
                            </button>
                        </div>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">3</span>
                        <div class="mt-2 w-full">
                            <button
                                class="w-full text-left px-2 py-1 mb-1 rounded bg-teal-900/50 border border-teal-500/30 text-teal-200 text-xs font-medium hover:bg-teal-800 hover:border-teal-400 transition truncate">
                                <span class="w-1.5 h-1.5 rounded-full bg-teal-400 inline-block mr-1"></span>
                                Web Dev Bootcamp
                            </button>
                        </div>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">4</span>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">5</span>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">6</span>
                        <div class="mt-2 w-full">
                            <button
                                class="w-full text-left px-2 py-1 mb-1 rounded bg-yellow-900/40 border border-yellow-600/30 text-yellow-200 text-xs font-medium hover:bg-yellow-800 hover:border-yellow-500 transition truncate">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 inline-block mr-1"></span>
                                Creative Writing Seminar
                            </button>
                        </div>
                    </div>


                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">7</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">8</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">9</span></div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">10</span>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">11</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">12</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">13</span></div>


                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">14</span></div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">15</span>
                        <div class="mt-2 w-full">
                            <button
                                class="w-full text-left px-2 py-1 mb-1 rounded bg-orange-900/50 border border-orange-500/30 text-orange-200 text-xs font-medium hover:bg-orange-800 hover:border-orange-400 transition truncate">
                                <span class="w-1.5 h-1.5 rounded-full bg-orange-500 inline-block mr-1"></span>
                                Data Science Meetup
                            </button>
                        </div>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">16</span>
                        <div class="mt-2 w-full">
                            <button
                                class="w-full text-left px-2 py-1 mb-1 rounded bg-indigo-900/50 border border-indigo-500/30 text-indigo-200 text-xs font-medium hover:bg-indigo-800 hover:border-indigo-400 transition truncate">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 inline-block mr-1"></span>
                                Graphic Design Workshop
                            </button>
                        </div>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">17</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">18</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">19</span></div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">20</span>
                        <div class="mt-2 w-full">
                            <button
                                class="w-full text-left px-2 py-1 mb-1 rounded bg-amber-900/40 border border-amber-600/30 text-amber-200 text-xs font-medium hover:bg-amber-800 hover:border-amber-500 transition truncate">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 inline-block mr-1"></span>
                                Web Dev Bootcamp
                            </button>
                        </div>
                    </div>


                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">21</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">22</span></div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">23</span>
                        <div class="mt-2 w-full">
                            <button
                                class="w-full text-left px-2 py-1 mb-1 rounded bg-indigo-900/50 border border-indigo-500/30 text-indigo-200 text-xs font-medium hover:bg-indigo-800 hover:border-indigo-400 transition truncate">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 inline-block mr-1"></span>
                                Graphic Design Workshop
                            </button>
                        </div>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">24</span></div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">25</span>
                        <div class="mt-2 w-full">
                            <button
                                class="w-full text-left px-2 py-1 mb-1 rounded bg-teal-900/50 border border-teal-500/30 text-teal-200 text-xs font-medium hover:bg-teal-800 hover:border-teal-400 transition truncate">
                                <span class="w-1.5 h-1.5 rounded-full bg-teal-400 inline-block mr-1"></span>
                                Graphic Design Workshop
                            </button>
                        </div>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">26</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">27</span></div>


                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">28</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">29</span></div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors">
                        <span class="text-gray-100 font-medium text-sm">30</span>
                        <div class="mt-2 w-full">
                            <button
                                class="w-full text-left px-2 py-1 mb-1 rounded bg-pink-900/50 border border-pink-500/30 text-pink-200 text-xs font-medium hover:bg-pink-800 hover:border-pink-400 transition truncate">
                                <span class="w-1.5 h-1.5 rounded-full bg-pink-400 inline-block mr-1"></span>
                                Python Coding Challenge
                            </button>
                        </div>
                    </div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-100 font-medium text-sm">31</span></div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">1</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">2</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">3</span></div>

                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">4</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">5</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">6</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">7</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">8</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">9</span></div>
                    <div class="min-h-[140px] bg-gray-900 p-2 relative group hover:bg-gray-850 transition-colors"><span
                            class="text-gray-500 font-medium text-sm">10</span></div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
