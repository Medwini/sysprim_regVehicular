<div>
    <h2>MODELOS</h2>
    <input type="text" wire:model="valor" />

    <button wire:click="crear">Guardar</button>

    <p>{{ $mensaje }}</p>

    @foreach($modelos as $modelo)
        <p>{{ $modelo->descripcion }}</p>
        @if ($edit)
            @if ($id_editar == $modelo->id)
            <input type="text" wire:model="valor_edit" />
            <button wire:click="editar({{ $modelo->id }})">Guardar</button>
            <button wire:click="cancelar_edit">Cancelar</button>
            @endif
        @else
            <button wire:click="hab_edit({{ $modelo->id }})">Editar</button>
            <button wire:click="eliminar({{ $modelo->id }})">Eliminar</button>
        @endif
    @endforeach
</div>