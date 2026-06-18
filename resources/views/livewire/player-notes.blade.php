<div>
    <h3>Historial de Notas</h3>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Autor</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notes as $note)
            <tr>
                <td>{{ $note->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $note->author->name }}</td>
                <td>{{ $note->content }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No hay notas registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @can('add-player-note')
    <div>
        <textarea
            wire:model="form.content"
            maxlength="500"
            placeholder="Escribe una nota...">
        </textarea>

        @error('form.content')
            <span>{{ $message }}</span>
        @enderror

        <button wire:click="saveNote">
            Agregar Nota
        </button>
    </div>
    @endcan
</div>