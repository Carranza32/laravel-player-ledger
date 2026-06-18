<x-layouts::app :title="__('Players')">
    <div class="fixed inset-0 z-0 pointer-events-none bg-slate-50">
        <div class="absolute top-0 right-0 w-1/2 rounded-full h-1/2 bg-blue-100/40 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/2 rounded-full h-1/2 bg-purple-100/30 blur-3xl"></div>
    </div>

    <div class="relative z-10 px-4 py-12 mx-auto max-w-6xl">
        <div class="p-6 border shadow-2xl sm:p-10 border-white/60 bg-white/60 backdrop-blur-2xl rounded-3xl shadow-slate-200/50">
            <div class="flex flex-col gap-4 mb-8 md:flex-row md:items-center md:justify-between">
                <div>
                    <flux:heading size="xl" class="text-transparent bg-clip-text bg-gradient-to-r from-slate-800 to-slate-500">
                        Directorio de Jugadores
                    </flux:heading>
                    <flux:subheading class="mt-2 text-slate-500">
                        Selecciona un perfil para gestionar su historial y notas de soporte.
                    </flux:subheading>
                </div>
            </div>

            <flux:table>
                <flux:table.columns>
                    <flux:table.column>Jugador</flux:table.column>
                    <flux:table.column>Contacto</flux:table.column>
                    <flux:table.column>Registro</flux:table.column>
                    <flux:table.column></flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse($players as $player)
                        <flux:table.row :key="$player->id" class="transition-colors duration-200 hover:bg-white/80">
                            
                            <flux:table.cell variant="strong">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center w-9 h-9 text-xs font-bold text-blue-700 bg-blue-100 border border-blue-200 rounded-full shadow-sm">
                                        {{ substr($player->name, 0, 1) }}
                                    </div>
                                    <span class="text-slate-800">{{ $player->name }}</span>
                                </div>
                            </flux:table.cell>
                            
                            <flux:table.cell class="text-slate-500">
                                {{ $player->email }}
                            </flux:table.cell>
                            
                            <flux:table.cell class="text-slate-500">
                                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                                    {{ $player->created_at->format('d M, Y') }}
                                </div>
                            </flux:table.cell>
                            
                            <flux:table.cell align="end">
                                <flux:button
                                    variant="ghost"
                                    size="sm"
                                    class="text-blue-600 transition-all hover:bg-blue-50 hover:text-blue-700 hover:shadow-sm"
                                    :href="route('players.show', $player)">
                                    Ver notas &rarr;
                                </flux:button>
                            </flux:table.cell>
                            
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="4" align="center" class="py-12 text-slate-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 mb-4 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    No se encontraron jugadores que coincidan con tu búsqueda.
                                </div>
                            </flux:table.cell>
                        </flux:table.row>
                    @endforelse
                </flux:table.rows>
            </flux:table>

            <div class="mt-6">
                {{ $players->links() }}
            </div>

        </div>
    </div>
</x-layouts::app>