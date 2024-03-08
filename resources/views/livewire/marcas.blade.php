<div>
    <h2>MARCAS</h2>
    <input type="text" wire:model="valor" />

    <button wire:click="crear">Guardar</button>

    <p>{{ $mensaje }}</p>

    @foreach($marcas as $marca)
        <p>{{ $marca->descripcion }}</p>
        @if ($edit)
            @if ($id_editar == $marca->id)
            <input type="text" wire:model="valor_edit" />
            <button wire:click="editar({{ $marca->id }})">Guardar</button>
            <button wire:click="cancelar_edit">Cancelar</button>
            @endif
        @else        
            <button wire:click="hab_edit({{ $marca->id }})">Editar</button>
            <button wire:click="eliminar({{ $marca->id }})">Eliminar</button>
        @endif
    @endforeach
</div>
