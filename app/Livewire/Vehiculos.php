<?php

namespace App\Livewire;

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
    public $id_editar = 0;

    public function crear(){
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
    }

    public function editar($id){
        $ConsultaVehiculos = VehiculosM::find($id);

        $ConsultaVehiculos->placa = $this->edit_placa;
        $ConsultaVehiculos->anio = $this->edit_anio;
        $ConsultaVehiculos->color = $this->edit_color;
        $ConsultaVehiculos->fecha_ing = $this->edit_fecha_ing;
        $ConsultaVehiculos->marca = $this->edit_marca;
        $ConsultaVehiculos->modelo = $this->edit_modelo;

        $ConsultaVehiculos->save();
        $this->mensaje = "Vehiculo actualizado exitosamente";
        $this->edit = false;
    }

    public function eliminar($id){
        VehiculosM::destroy($id);
        $this->mensaje = "Vehiculo eliminado exitosamente";
    }

    public function hab_edit($id){
        $this->edit = true;
        $this->id_editar = $id;
    }

    public function cancelar_edit(){
        $this->edit = false;
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
            'id_editar' => $this->id_editar
        ]);
    }
}
