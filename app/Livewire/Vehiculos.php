<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;

use Livewire\Component;
use App\Models\MarcasM;
use App\Models\ModelosM;
use App\Models\VehiculosM;

class Vehiculos extends Component
{

    public $valor_placa ="";
    public $valor_anio ="";
    public $valor_color ="";
    public $valor_fecha_ing ="";
    public $valor_marca ="";
    public $valor_modelo ="";

    public $edit_placa ="";
    public $edit_anio ="";
    public $edit_color ="";
    public $edit_fecha_ing ="";
    public $edit_marca ="";
    public $edit_modelo ="";

    public $mensaje = "";
    public $edit = false;
    public $new = false;
    public $id_editar = 0;
    public $mensaje_a ="";

    protected $rules = [
        "valor_placa" => 'required|min:4|unique:vehiculos_m_s,placa',
        "valor_anio" => 'required|integer|min:4|max:4',
        "valor_color" => 'required|min:2',
        "valor_fecha_ing" => 'required|min:4',
        "valor_marca" => 'required',
        "valor_modelo" => 'required'
    ];


    protected $messages = [
        'unique' => 'Este valor ya existe.',
        'required' => 'El campo no puede estar vacío.',
        'min' => 'El campo posee pocos carácteres.',
        'max' => 'El campo posee demasiados carácteres.',
        'integer' => 'El campo debe ser un número entero.'
    ];

    public function limpiar(){
        $this->reset([
            'edit', 
            'id_editar', 
            'valor_placa',
            'valor_anio',
            'valor_color',
            'valor_fecha_ing',
            'valor_marca',
            'valor_modelo',
            'edit_placa',
            'edit_anio',
            'edit_color',
            'edit_fecha_ing',
            'edit_marca',
            'edit_modelo',
            'new'
        ]);
    }

    public function nuevo(){
        $this->new = true;
    }

    public function crear(){
        $this->validate();

        VehiculosM::create(
            [
                "placa" => $this->valor_placa,
                "anio" => $this->valor_anio,
                "color" => $this->valor_color,
                "fecha_ing" => $this->valor_fecha_ing,
                "marca" => $this->valor_marca,
                "modelo" => $this->valor_modelo
            ]
        );
        $this->mensaje = "Vehiculo registrado exitosamente";
        $this->limpiar();
    }

    public function editar($id){
        $this->validate([   
            "edit_placa" => 'required|min:4',
            "edit_anio" => 'required|integer|min:4|max:4',
            "edit_color" => 'required|min:2',
            "edit_fecha_ing" => 'required|min:4',
            "edit_marca" => 'required',
            "edit_modelo" => 'required'
        ]);

        $ConsultaVehiculos = VehiculosM::find($id);

        $ConsultaVehiculos->placa = $this->edit_placa;
        $ConsultaVehiculos->anio = $this->edit_anio;
        $ConsultaVehiculos->color = $this->edit_color;
        $ConsultaVehiculos->fecha_ing = $this->edit_fecha_ing;
        $ConsultaVehiculos->marca = $this->edit_marca;
        $ConsultaVehiculos->modelo = $this->edit_modelo;

        $ConsultaVehiculos->save();
        $this->mensaje = "Vehiculo actualizado exitosamente";
        $this->limpiar();
    }

    public function eliminar($id){
        VehiculosM::destroy($id);
        $this->mensaje = "Vehiculo eliminado exitosamente";
    }

    public function hab_edit($id){
        $this->edit = true;
        $this->id_editar = $id;
        $ConsultaVehiculos = VehiculosM::find($id);

        $this->edit_placa = $ConsultaVehiculos->placa;
        $this->edit_anio = $ConsultaVehiculos->anio;
        $this->edit_color = $ConsultaVehiculos->color;
        $this->edit_fecha_ing = $ConsultaVehiculos->fecha_ing;
        $this->edit_marca = $ConsultaVehiculos->marca;
        $this->edit_modelo = $ConsultaVehiculos->modelo;
    }

    public function cancelar_edit(){
        $this->limpiar();
        $this->mensaje = "";
    }
    

    public function render()
    {
        $marcas = MarcasM::all();
        $modelos = ModelosM::all();
        $vehiculos = VehiculosM::all();
        return view('livewire.vehiculos', [
            'vehiculos' => $vehiculos,
            'marcas' => $marcas,
            'modelos' => $modelos,
            'edit' => $this->edit,
            'id_editar' => $this->id_editar,
            'nuevo' => $this->new
        ]);
    }
}
