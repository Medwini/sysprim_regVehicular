<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MarcasM;

class Marcas extends Component
{

    public $valor ="";
    public $valor_edit ="";
    public $mensaje = "";
    public $edit = false;
    public $id_editar = 0;

    public function crear(){
        MarcasM::create(
            [
                "descripcion" => $this->valor
            ]
        );
        $this->mensaje = "Marca registrada exitosamente";
    }

    public function editar($id){
        $ConsultaMarcas = MarcasM::find($id);
        $ConsultaMarcas->descripcion = $this->valor_edit;
        $ConsultaMarcas->save();
        $this->mensaje = "Marca actualizada exitosamente";
        $this->edit = false;
    }

    public function eliminar($id){
        MarcasM::destroy($id);
        $this->mensaje = "Marca eliminada exitosamente";
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
        return view('livewire.marcas', [
            'marcas' => $marcas,
            'edit' => $this->edit,
            'id_editar' => $this->id_editar
        ]);
    }
}
