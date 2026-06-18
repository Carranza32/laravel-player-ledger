<x-layouts::app :title="__('Players')">
    <div class="max-w-4xl mx-auto py-10 px-4">

        <div class="mb-6">
            <flux:button variant="ghost" size="sm" :href="route('players.index')" icon="arrow-left" class="text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors">
                Back to players
            </flux:button>
        </div>

        <div class="text-sm font-semibold text-slate-400 mb-4 tracking-wide uppercase px-2">
            Notas del Jugador
        </div>

        <div class="bg-white rounded-[2rem] p-6 flex items-center justify-between shadow-[0_4px_20px_rgb(0,0,0,0.05)] border border-slate-100 mb-8">
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
            </div>
        </div>
        
        <livewire:player-notes :player-id="$player->id" />
    </div>
</x-layouts::app>