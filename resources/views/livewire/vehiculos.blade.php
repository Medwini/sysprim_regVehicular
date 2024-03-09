<div>
    <div class="cont_titulo">
        <h2 class="titulo">VEHICULOS</h2>
    </div>

    <div class="container shadow p-3 mb-5 bg-body rounded">
        @if ($edit)
    
            @foreach($vehiculos as $vehiculo)
                @if ($id_editar == $vehiculo->id)
                <div class="cont_titulo">
                    <h2 class="titulo">Editar</h2>
                </div>
                    <form wire:submit.prevent="editar({{ $vehiculo->id }})">
                        @csrf

                        <div class="input-group flex-nowrap my-3">
                            <span class="input-group-text" id="addon-wrapping">Placa:</span>
                            <input type="text" wire:model="edit_placa" class="form-control" aria-describedby="addon-wrapping">
                        </div>
                        <!-- <label for="">Placa:</label>
                        <input type="text" wire:model="edit_placa" class="form-control" /> -->
                        @error('edit_placa')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror
                        <div class="input-group flex-nowrap my-3">
                            <span class="input-group-text" id="addon-wrapping">Año:</span>
                            <input type="text" wire:model="edit_anio" class="form-control" aria-describedby="addon-wrapping">
                        </div>
                        @error('edit_anio')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror
                        <div class="input-group flex-nowrap my-3">
                            <span class="input-group-text" id="addon-wrapping">Color:</span>
                            <input type="text" wire:model="edit_color" class="form-control" aria-describedby="addon-wrapping">
                        </div>
                        @error('edit_color')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror
                        <div class="input-group flex-nowrap my-3">
                            <span class="input-group-text" id="addon-wrapping">Fecha Ingreso:</span>
                            <input type="text" wire:model="edit_fecha_ing" class="form-control" aria-describedby="addon-wrapping">
                        </div>
                        @error('edit_fecha_ing')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Marca:</label>
                            <select class="form-select" wire:model="edit_marca"  id="inputGroupSelect01">
                                <option value="0" selected>Seleccione...</option>
                                @foreach($marcas as $marca)
                                    <option value="{{$marca->id}}">{{$marca->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('edit_marca')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Modelo:</label>
                            <select class="form-select" wire:model="edit_modelo" id="inputGroupSelect01">
                                <option value="0" selected>Seleccione...</option>
                                @foreach($modelos as $modelo)
                                    <option value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
    
                        
                        @error('edit_modelo')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror
    
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button wire:click.prevent="cancelar_edit" class="btn btn-warning">Cancelar</button>
                    </form>
    
                @endif
            @endforeach
        @else

            @if ($nuevo)
            <div class="cont_titulo">
                <h2 class="titulo">Crear</h2>
            </div>
            <form wire:submit="crear">
                @csrf
                <div class="input-group flex-nowrap my-3">
                    <span class="input-group-text" id="addon-wrapping">Placa:</span>
                    <input type="text" wire:model="valor_placa" class="form-control" aria-describedby="addon-wrapping">
                </div>
                @error('valor_placa')
                    <p class="error_m">• {{ $message }}</p>
                @enderror
                <div class="input-group flex-nowrap my-3">
                    <span class="input-group-text" id="addon-wrapping">Año:</span>
                    <input type="text" wire:model="valor_anio" class="form-control" aria-describedby="addon-wrapping">
                </div>
                @error('valor_anio')
                    <p class="error_m">• {{ $message }}</p>
                @enderror
                <div class="input-group flex-nowrap my-3">
                    <span class="input-group-text" id="addon-wrapping">Color:</span>
                    <input type="text" wire:model="valor_color" class="form-control" aria-describedby="addon-wrapping">
                </div>
                @error('valor_color')
                    <p class="error_m">• {{ $message }}</p>
                @enderror

                <div class="input-group flex-nowrap my-3">
                    <span class="input-group-text" id="addon-wrapping">Fecha de Ingreso:</span>
                    <input type="text" wire:model="valor_fecha_ing" class="form-control" aria-describedby="addon-wrapping">
                </div>

                @error('valor_fecha_ing')
                    <p class="error_m">• {{ $message }}</p>
                @enderror
                
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Marca:</label>
                    <select class="form-select" wire:model="valor_marca" id="inputGroupSelect01">
                        <option value="0" selected>Seleccione...</option>
                        @foreach($marcas as $marca)
                            <option value="{{$marca->id}}">{{$marca->descripcion}}</option>
                        @endforeach
                    </select>
                </div>

                @error('valor_marca')
                    <p class="error_m">• {{ $message }}</p>
                @enderror

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Modelo:</label>
                    <select class="form-select" wire:model="valor_modelo" id="inputGroupSelect01">
                        <option value="0" selected>Seleccione...</option>
                        @foreach($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
                        @endforeach
                    </select>
                </div>
    
                @error('valor_modelo')
                    <p class="error_m">• {{ $message }}</p>
                @enderror
    
                <button type="submit" class="btn btn-success">Guardar</button>
                <button wire:click.prevent="limpiar" class="btn btn-warning">Cancelar</button>
            </form>
            @else
                <button wire:click="nuevo" class="btn btn_nuevo">Nuevo</button>
            @endif
        @endif

        <p class="my-3 msg-crud">{{ $mensaje }}</p>
    </div>

    <div class="container">
        <table class="table px-2">
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
                        <td>
                            @foreach ($marcas as $marca)
                                @if ($vehiculo->marca == $marca->id)
                                    {{ $marca->descripcion }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($modelos as $modelo)
                                @if ($vehiculo->modelo == $modelo->id)
                                    {{ $modelo->descripcion }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <button wire:click="hab_edit({{ $vehiculo->id }})" class="btn btn-primary">Editar</button>
                            <button wire:click="eliminar({{ $vehiculo->id }})" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</div>