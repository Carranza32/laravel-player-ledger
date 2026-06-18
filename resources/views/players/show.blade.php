<x-layouts::app :title="__('Players')">
    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-semibold leading-tight text-gray-800">
                Historial y Notas
            </h2>
            <a href="{{ route('players.index') }}" wire:navigate class="text-sm text-gray-500 transition hover:text-gray-900">
                &larr; Volver al directorio
            </a>
        </div>

        <div class="p-6 mb-8 overflow-hidden bg-white border border-gray-100 rounded-lg shadow-sm">
            <div class="flex items-center space-x-4">
                <div class="flex items-center justify-center w-12 h-12 text-xl font-bold text-blue-700 bg-blue-100 rounded-full">
                    {{ substr($player->name, 0, 1) }}
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ $player->name }}</h3>
                    <p class="text-sm text-gray-500">
                        Player ID: <span class="font-mono">#{{ str_pad($player->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <livewire:player-notes :playerId="$player->id" />
        </div>

    </div>
</x-layouts::app>