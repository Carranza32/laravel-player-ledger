<x-layouts::app :title="__('Players')">
    <div class="fixed inset-0 z-0 pointer-events-none bg-slate-50">
        <div class="absolute top-0 right-0 w-1/2 rounded-full h-1/2 bg-blue-100/40 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/2 rounded-full h-1/2 bg-purple-100/30 blur-3xl"></div>
    </div>

    <div class="relative z-10 px-4 py-12 mx-auto max-w-6xl">
        <div class="mb-6">
            <flux:button variant="ghost" size="sm" :href="route('players.index')" icon="arrow-left" class="text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors">
                Back to players
            </flux:button>
        </div>

        <div class="text-sm font-semibold text-slate-400 mb-4 tracking-wide uppercase px-2">
            Notas del Jugador
        </div>

        <div class="p-3 mb-5 border shadow-2xl sm:p-3 border-white/60 bg-white/60 backdrop-blur-2xl rounded-3xl shadow-slate-200/50">
            <div class="flex items-center space-x-5">
                <div class="relative">
                    <img 
                        src="https://ui-avatars.com/api/?name={{ urlencode($player->name) }}&background=4F46E5&color=fff&bold=true" 
                        alt="Avatar" 
                        class="w-14 h-14 rounded-full ring-4 ring-indigo-50/50"
                    >
                    <span class="absolute bottom-0 right-0 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></span>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-slate-800">{{ $player->name }}</h2>
                    <p class="text-sm text-slate-500 flex items-center gap-2 mt-0.5">
                        <span>{{ $player->email }}</span> 
                    </p>

                    
                </div>

                <div class="flex space-x-3 text-sm font-medium ml-auto">
                    <span class="px-4 py-2 bg-indigo-50/80 text-[#4F46E5] rounded-full border border-indigo-100/50 shadow-sm">
                        5 Notas
                    </span>
                </div>
            </div>
        </div>
        
        <livewire:player-notes :player-id="$player->id" />
    </div>
</x-layouts::app>