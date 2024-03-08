<div>
    <h2>MODELOS</h2>
    @foreach($modelos as $modelo)
        @if ($edit)
            @if ($id_editar == $modelo->id)
            <input type="text" wire:model="valor_edit" />
            <button wire:click="editar({{ $modelo->id }})">Guardar</button>
            <button wire:click="cancelar_edit">Cancelar</button>
            @endif
        @endif
    @endforeach
    @if (!$edit)
        <input type="text" wire:model="valor" />
        <button wire:click="crear">Guardar</button>
        <button wire:click="limpiar">Cancelar</button>
    @endif

    <p>{{ $mensaje }}</p>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modelos as $modelo)
                <tr>
                    <td>{{ $modelo->id }}</td>
                    <td>{{ $modelo->descripcion }}</td>
                    <td>
                        @if (!$edit)
                            <button wire:click="hab_edit({{ $modelo->id }})">Editar</button>
                            <button wire:click="eliminar({{ $modelo->id }})">Eliminar</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
</div>