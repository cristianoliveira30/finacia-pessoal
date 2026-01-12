{{-- Passamos os parâmetros para ocultar a estrutura padrão do Layout --}}
<x-layouts.app :title="__('Configurações do Usuário')">

    <div class="w-full screen px-4 sm:px- lg:px-16 flex flex-col justify-center max-w-7xl mx-auto">

        {{-- Cabeçalho da Seção --}}
        <div class="flex items-center justify-between pt-2">
            <div>
                <h2 class="text-3xl font-bold text-slate-800 dark:text-white black:text-zinc-100 tracking-tight">
                    Meu Perfil
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 black:text-zinc-400 mt-1">
                    Gerencie suas informações pessoais e segurança.
                </p>
            </div>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 pt-2">

                {{-- COLUNA 1: Card de Perfil --}}
                <div class="lg:col-span-1">
                    {{-- Surface: Zinc-900  | Border: Zinc-800 [cite: 28] --}}
                    <div class="relative w-full h-full overflow-hidden bg-slate-50 dark:bg-slate-800 black:bg-zinc-900 p-6 rounded-xl border border-slate-200 dark:border-slate-700 black:border-zinc-800 shadow-sm">
                        
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full blur-2xl transition-all pointer-events-none bg-slate-500/5 dark:bg-slate-500/10 black:bg-zinc-500/10"></div>

                        <div class="relative z-10 flex flex-col items-center text-center">
                            {{-- Foto de Perfil --}}
                            <div class="relative group">
                                <div class="w-32 h-32 rounded-full p-1 border-2 border-slate-200 dark:border-slate-600 black:border-zinc-700 bg-white dark:bg-slate-700 black:bg-zinc-800">
                                    <img src="{{ auth()->user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=E2E8F0&color=64748B' }}" 
                                         alt="Profile" 
                                         class="w-full h-full rounded-full object-cover">
                                </div>
                                    <label for="photo" class="absolute bottom-0 right-0 bg-sky-500 text-white p-2 rounded-full cursor-pointer hover:bg-sky-600 transition-colors shadow-lg border-2 border-slate-50 dark:border-slate-800 black:border-zinc-800">
                                        <x-bi-camera class="w-4 h-4"/>
                                    </label>
                                    <input type="file" id="photo" name="photo" class="hidden" accept="image/*">
                                </div>

                                <div class="mt-4 space-y-1">
                                    {{-- Texto Principal: Zinc-100  --}}
                                    <h3 class="text-xl font-bold text-slate-800 dark:text-white black:text-zinc-100 tracking-tight">
                                        {{ auth()->user()->name }}
                                    </h3>
                                </div>
                                <div class="mt-4">
                                {{-- Botão Dropdown: Surface Highlight Zinc-800 ou 900 --}}
                                <button id="themeDropdownButton" data-dropdown-toggle="themeDropdown" class="text-slate-700 dark:text-slate-200 black:text-zinc-200 bg-white dark:bg-slate-700 black:bg-zinc-800 black:hover:bg-zinc-700 hover:bg-slate-50 dark:hover:bg-slate-600 focus:ring-2 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center shadow-sm border border-slate-200 dark:border-slate-600 black:border-zinc-700 transition-colors" type="button">
                                    <x-bi-palette class="w-4 h-4 mr-2"/> 
                                    Tema: <span id="current-theme-label" class="ml-1 font-bold">Selecionar</span>
                                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>

                                {{-- Menu Dropdown: Surface Zinc-900 --}}
                                <div id="themeDropdown" class="z-10 hidden bg-white divide-y divide-slate-100 rounded-lg shadow w-44 dark:bg-slate-700 black:bg-zinc-900 border  border-slate-100 dark:border-slate-600 black:border-zinc-800">
                                    {{-- Texto de apoio no menu: Zinc-300  --}}
                                    <ul class="py-2 text-sm text-slate-700 dark:text-slate-200 black:text-zinc-300" aria-labelledby="themeDropdownButton">
                                        
                                        <li>
                                            <button type="button" data-theme="light" class="set-theme-btn w-full text-left px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 black:hover:bg-zinc-800 flex items-center gap-2">
                                                <x-bi-sun class="w-4 h-4 text-amber-500"/>
                                                Claro
                                            </button>
                                        </li>

                                        <li>
                                            <button type="button" data-theme="dark" class="set-theme-btn w-full text-left px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 black:hover:bg-zinc-800 flex items-center gap-2">
                                                <x-bi-moon-stars class="w-4 h-4 text-purple-500"/>
                                                Neon
                                            </button>
                                        </li>

                                        <li>
                                            <button type="button" data-theme="black" class="set-theme-btn w-full text-left px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 black:hover:bg-zinc-800 flex items-center gap-2">
                                                <div class="w-4 h-4 bg-slate-900 black:bg-zinc-950 border border-slate-600 black:border-zinc-700 rounded-full"></div>
                                                Escuro
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- COLUNA 2: Formulário de Edição --}}
                <div class="lg:col-span-2">
                    {{-- Surface: Zinc-900 --}}
                    <div class="relative w-full overflow-hidden bg-slate-50 dark:bg-slate-800 black:bg-zinc-900 p-6 rounded-xl border border-slate-200 dark:border-slate-700 black:border-zinc-800 shadow-sm h-full">
                        
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 rounded-full blur-3xl transition-all pointer-events-none bg-sky-500/5"></div>

                        <div class="relative z-10 space-y-8">
                            
                            {{-- Seção: Dados Pessoais --}}
                            <div>
                                <h3 class="flex items-center gap-2 text-lg font-bold text-slate-800 dark:text-white black:text-zinc-100 mb-5 pb-2 border-b border-slate-200 dark:border-slate-700 black:border-zinc-800">
                                    <x-bi-person class="w-5 h-5 text-sky-500"/> Informações Pessoais
                                </h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div class="space-y-1">
                                        {{-- Labels: Zinc-400  --}}
                                        <label for="name" class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                            Nome Completo
                                        </label>
                                        <div class="relative">
                                            {{-- Inputs: Bg Zinc-950 (Fundo Principal para contraste com Surface) [cite: 40] | Border Zinc-700  --}}
                                            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                                                class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                                placeholder="Seu nome">
                                        </div>
                                        @error('name') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="space-y-1">
                                        <label for="email" class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                            Endereço de Email
                                        </label>
                                        <div class="relative">
                                            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                                                class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                                placeholder="nome@exemplo.com">
                                        </div>
                                        @error('email') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Seção: Segurança --}}
                            <div>
                                <h3 class="flex items-center gap-2 text-lg font-bold text-slate-800 dark:text-white black:text-zinc-100 mb-5 pb-2 border-b border-slate-200 dark:border-slate-700 black:border-zinc-800">
                                    <x-bi-shield-lock class="w-5 h-5 text-sky-500"/> Segurança
                                </h3>

                                <div class="space-y-5">
                                    <div class="space-y-1">
                                        <label for="current_password" class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                            Senha Atual
                                        </label>
                                        <input type="password" name="current_password" id="current_password"
                                            class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                            placeholder="••••••••">
                                        @error('current_password') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div class="space-y-1">
                                            <label for="password" class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                                Nova Senha
                                            </label>
                                            <input type="password" name="password" id="password"
                                                class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                                placeholder="••••••••">
                                        </div>

                                        <div class="space-y-1">
                                            <label for="password_confirmation" class="text-slate-500 dark:text-slate-400 black:text-zinc-400 text-xs font-bold uppercase tracking-wider">
                                                Confirmar Senha
                                            </label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="w-full bg-white dark:bg-slate-900 black:bg-zinc-950 border border-slate-300 dark:border-slate-600 black:border-zinc-700 text-slate-700 dark:text-slate-200 black:text-zinc-100 text-sm rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent block p-2.5 transition-all shadow-sm placeholder-slate-400 black:placeholder-zinc-500"
                                                placeholder="••••••••">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Ações --}}
                            <div class="flex justify-end pt-4">
                                <button type="submit" 
                                    class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-white transition-all duration-200 bg-sky-600 rounded-lg hover:bg-sky-500 hover:shadow-lg hover:shadow-sky-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-600 dark:focus:ring-offset-slate-900">
                                    <span>Salvar Alterações</span>
                                    <x-bi-check-lg class="w-4 h-4 ml-2 group-hover:scale-110 transition-transform"/>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</x-layouts.app>