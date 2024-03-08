<div>
    <div class="cont_titulo">
        <h2 class="titulo">MARCAS</h2>
    </div>

    <div class="container shadow p-3 mb-5 bg-body rounded">
        @foreach($marcas as $marca)
            @if ($edit)
                @if ($id_editar == $marca->id)
                    <div class="input-group">
                        <input type="text" class="form-control" wire:model="valor_edit" />
                        <button class="btn btn-outline-success" wire:click="editar({{ $marca->id }})">Guardar</button>
                        <button class="btn btn-outline-secondary" wire:click="cancelar_edit">Cancelar</button>
                    </div>
                    <!-- <input type="text" wire:model="valor_edit"/> -->
                    @error('valor_edit')
                        <p>{{ $message }}</p>
                    @enderror
                    <!-- <button wire:click="editar({{ $marca->id }})">Guardar</button>
                    <button wire:click="cancelar_edit">Cancelar</button> -->
                @endif
            @endif   
        @endforeach
        @if (!$edit)
            @if ($nuevo)
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="valor" />
                    <button class="btn btn-outline-success" wire:click="crear">Guardar</button>
                    <button class="btn btn-outline-secondary" wire:click="limpiar">Cancelar</button>
                </div>
                <!-- <input type="text" wire:model="valor" /> -->
                @error('valor')
                    <p>{{ $message }}</p>
                @enderror

                <!-- <button wire:click="crear">Guardar</button>
                <button wire:click="limpiar">Cancelar</button> -->
            @else
                <button wire:click="nuevo" class="btn btn-info">Nuevo</button>
            @endif
        
        @endif
        <p class="my-3">{{ $mensaje }}</p>
    </div>


    <div class="container">
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
                            <button wire:click="hab_edit({{ $marca->id }})" class="btn btn-primary">Editar</button>
                            <button wire:click="eliminar({{ $marca->id }})" class="btn btn-danger">Eliminar</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
</div>
