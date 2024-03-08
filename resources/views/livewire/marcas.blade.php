<div>
    <h2>MARCAS</h2>
    @foreach($marcas as $marca)
        @if ($edit)
            @if ($id_editar == $marca->id)
                <input type="text" wire:model="valor_edit"/>
                <button wire:click="editar({{ $marca->id }})">Guardar</button>
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
            @foreach($marcas as $marca)
            <tr>
                <td>{{ $marca->id }}</td>
                <td>{{ $marca->descripcion }}</td>
                <td>
                    @if (!$edit)      
                        <button wire:click="hab_edit({{ $marca->id }})">Editar</button>
                        <button wire:click="eliminar({{ $marca->id }})">Eliminar</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        
</div>
