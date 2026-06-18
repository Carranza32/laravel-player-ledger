<div class="relative pb-8" x-data="{ content: @entangle('form.content') }">
    <div class="space-y-5">
        @forelse($notes as $note)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-2 text-indigo-700 font-semibold text-sm">
                        <div class="w-7 h-7 bg-indigo-100 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <span>Agente: {{ $note->author->name }}</span>
                    </div>
                    <div class="text-sm text-slate-400 font-medium uppercase tracking-wider">
                        {{ $note->created_at->format('M d, g:i A') }}
                    </div>
                </div>
                
                <p class="text-slate-600 mb-5 leading-relaxed">
                    {{ $note->content }}
                </p>

                <div class="flex space-x-2">
                    <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-semibold">Nota</span>
                </div>
            </div>
        @empty
            <div class="text-center text-slate-400 py-6">
                No hay notas registradas para este jugador.
            </div>
        @endforelse
    </div>

    @can('add-player-note')
    <div class="mt-8 bg-white rounded-[2rem] shadow-[0_4px_20px_rgb(0,0,0,0.05)] border border-slate-100 p-2">
        <div class="bg-slate-50/80 rounded-3xl p-3 flex flex-col gap-2">
            <textarea
                wire:model.live="form.content"
                maxlength="500"
                rows="3"
                class="w-full bg-transparent border-none border-0 focus:border-none focus:ring-0 outline-none shadow-none resize-none text-slate-700 placeholder-slate-400 p-3"
                placeholder="Escribe una nueva nota sobre el jugador...">
            </textarea>

            <div class="flex items-center justify-between px-3 pb-1">
                <div class="flex-1">
                    @error('form.content')
                        <span class="text-red-500 text-sm font-medium flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            <span>La nota no puede estar vacía</span>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center space-x-5">
                    <span class="text-sm font-medium text-slate-400">
                        <span x-text="(content || '').length">0</span> / 500
                    </span>

                    <button 
                        wire:click="saveNote"
                        class="bg-[#4F46E5] hover:bg-[#4338CA] text-white px-6 py-2 rounded-full font-medium flex items-center space-x-2 transition-all shadow-sm cursor-pointer">
                        <span>Guardar</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 15 6-6m0 0-6-6m6 6H9a6 6 0 0 0 0 12h3"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endcan
</div>