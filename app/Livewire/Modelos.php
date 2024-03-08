<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ModelosM;

class Modelos extends Component
{

    public $valor ="";
    public $valor_edit ="";
    public $mensaje = "";
    public $edit = false;
    public $id_editar = 0;

    public function crear(){
        ModelosM::create(
            [
                "descripcion" => $this->valor
            ]
        );
        $this->mensaje = "Modelo registrado exitosamente";
    }

    public function editar($id){
        $ConsultaModelos = ModelosM::find($id);
        $ConsultaModelos->descripcion = $this->valor_edit;
        $ConsultaModelos->save();
        $this->mensaje = "Modelo actualizado exitosamente";
        $this->edit = false;
    }

    public function eliminar($id){
        ModelosM::destroy($id);
        $this->mensaje = "Modelo eliminada exitosamente";
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
        $modelos = ModelosM::all();
        return view('livewire.modelos', [
            'modelos' => $modelos,
            'edit' => $this->edit,
            'id_editar' => $this->id_editar
        ]);
    }
}
