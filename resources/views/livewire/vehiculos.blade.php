<div>
    <h2>VEHICULOS</h2>
    @if ($edit)

        @foreach($vehiculos as $vehiculo)
            @if ($id_editar == $vehiculo->id)
                <form wire:submit.prevent="editar({{ $vehiculo->id }})">
                    @csrf
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
                    <button type="submit">Guardar</button>
                    <button wire:click.prevent="cancelar_edit">Cancelar</button>
                </form>

            @endif
        @endforeach
    @else
        <form wire:submit="crear">
            @csrf
            <label for="txtPlaca">Placa:</label>
            <input type="text" wire:model="valor_placa" id="txtPlaca" />
            @error('valor_placa')
                <p>{{ $message }}</p>
            @enderror
            <label for="txtAnio">Año:</label>
            <input type="text" wire:model="valor_anio" id="txtAnio" />
            @error('valor_anio')
                <p>{{ $message }}</p>
            @enderror
            <label for="txtColor">Color:</label>
            <input type="text" wire:model="valor_color" id="txtColor" />
            @error('valor_color')
                <p>{{ $message }}</p>
            @enderror
            <label for="txtFIngreso">Fecha de Ingreso:</label>
            <input type="text" wire:model="valor_fecha_ing" id="txtFIngreso" />
            @error('valor_fecha_ing')
                <p>{{ $message }}</p>
            @enderror
            
            <label for="txtMarca">Marca:</label>
            <select name="select" wire:model="valor_marca">
                <option value="-" selected>Seleccione...</option>
                @foreach($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->descripcion}}</option>
                @endforeach
            </select>
            @error('valor_marca')
                <p>{{ $message }}</p>
            @enderror

            <label for="txtModelo">Modelo:</label>
            <select name="select" wire:model="valor_modelo">
                <option value="-" selected>Seleccione...</option>
                @foreach($modelos as $modelo)
                    <option value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
                @endforeach
            </select>
            @error('valor_modelo')
                <p>{{ $message }}</p>
            @enderror

            <button type="submit">Guardar</button>
            <button wire:click.prevent="limpiar">Cancelar</button>
        </form>
    @endif


    <p>{{ $mensaje }}</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Placa</th>
                <th scope="col">Año</th>
                <th scope="col">Color</th>
                <th scope="col">Fecha de Ingreso</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <th scope="row">{{ $vehiculo->id }}</th>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->anio }}</td>
                    <td>{{ $vehiculo->color }}</td>
                    <td>{{ $vehiculo->fecha_ing }}</td>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>
                        <button wire:click="hab_edit({{ $vehiculo->id }})">Editar</button>
                        <button wire:click="eliminar({{ $vehiculo->id }})">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>