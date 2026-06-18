<x-layouts::app :title="__('Players')">
    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h2 class="text-2xl font-semibold leading-tight text-gray-800">
                Directorio de Jugadores
            </h2>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($players as $player)
                <div class="p-6 transition duration-150 ease-in-out bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-md bg-opacity-90 backdrop-blur-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">{{ $player->name }}</h3>
                            <p class="text-sm text-gray-500">ID: #{{ $player->id }}</p>
                        </div>
                        <a href="{{ route('players.show', $player->id) }}" 
                           wire:navigate 
                           class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                            Ver Notas
                        </a>
                    </div>
                </div>
            @empty
                <div class="p-6 text-gray-500 bg-white rounded-lg shadow-sm col-span-full">
                    No hay jugadores registrados en el sistema.
                </div>
            @endforelse
        </div>
    </div>
</x-layouts::app>