<div>
    <h2>VEHICULOS</h2>
    <form wire:submit="crear">
        @csrf
        <label for="txtPlaca">Placa:</label>
        <input type="text" wire:model="valor_placa" id="txtPlaca" />
        <label for="txtAnio">Año:</label>
        <input type="text" wire:model="valor_anio" id="txtAnio" />
        <label for="txtColor">Color:</label>
        <input type="text" wire:model="valor_color" id="txtColor" />
        <label for="txtFIngreso">Fecha de Ingreso:</label>
        <input type="text" wire:model="valor_fecha_ing" id="txtFIngreso" />

        
        <label for="txtMarca">Marca:</label>
        <select name="select" wire:model="valor_marca">
            <option value="-" selected>Seleccione...</option>
            @foreach($marcas as $marca)
                <option value="{{$marca->id}}">{{$marca->descripcion}}</option>
            @endforeach
        </select>

        <label for="txtModelo">Modelo:</label>
        <select name="select" wire:model="valor_modelo">
            <option value="-" selected>Seleccione...</option>
            @foreach($modelos as $modelo)
                <option value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
            @endforeach
        </select>

        <button type="submit">Guardar</button>
    </form>

    <p>{{ $mensaje }}</p>

    @foreach($vehiculos as $vehiculo)
        <p>{{ $vehiculo->placa }}</p>
        <p>{{ $vehiculo->anio }}</p>
        <p>{{ $vehiculo->color }}</p>
        <p>{{ $vehiculo->fecha_ing }}</p>
        <p>{{ $vehiculo->marca }}</p>
        <p>{{ $vehiculo->modelo }}</p>

        @if ($edit)
            @if ($id_editar == $vehiculo->id)
            <label for="">Placa:</label>
            <input type="text" wire:model="edit_placa" />
            <label for="">Año:</label>
            <input type="text" wire:model="edit_anio" />
            <label for="">Color:</label>
            <input type="text" wire:model="edit_color" />
            <label for="">Fecha de Ingreso:</label>
            <input type="text" wire:model="edit_fecha_ing" />

            <label for="txtMarca">Marca:</label>
            <select name="select" wire:model="edit_marca">
                <option value="-" selected>Seleccione...</option>
                @foreach($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->descripcion}}</option>
                @endforeach
            </select>

            <label for="txtModelo">Modelo:</label>
            <select name="select" wire:model="edit_modelo">
                <option value="-" selected>Seleccione...</option>
                @foreach($modelos as $modelo)
                    <option value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
                @endforeach
            </select>
            <button wire:click="editar({{ $vehiculo->id }})">Guardar</button>
            <button wire:click="cancelar_edit">Cancelar</button>

            @endif
        @else
        <button wire:click="hab_edit({{ $vehiculo->id }})">Editar</button>
        <button wire:click="eliminar({{ $vehiculo->id }})">Eliminar</button>
        @endif
    @endforeach
</div>