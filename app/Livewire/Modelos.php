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
    public $new = false;

    protected $rules = [
        "valor" => 'required|min:4|unique:marcas_m_s,descripcion',
    ];


    protected $messages = [
        'unique' => 'Este valor ya existe.',
        'required' => 'El campo no puede estar vacío.',
        'min' => 'El campo posee pocos carácteres.',
        'max' => 'El campo posee demasiados carácteres.',
    ];

    public function limpiar(){
        $this->reset(['edit', 'id_editar', 'valor', 'valor_edit', 'new']);
    }

    public function nuevo(){
        $this->new = true;
    }

    public function crear(){
        $this->validate([   
            "valor" => 'required|min:4|unique:marcas_m_s,descripcion'
        ]);

        ModelosM::create(
            [
                "descripcion" => $this->valor
            ]
        );
        $this->mensaje = "Modelo registrado exitosamente";
        $this->limpiar();
    }

    public function editar($id){
        $this->validate([   
            "valor_edit" => 'required|min:4|unique:marcas_m_s,descripcion'
        ]);

        $ConsultaModelos = ModelosM::find($id);
        $ConsultaModelos->descripcion = $this->valor_edit;
        $ConsultaModelos->save();
        $this->mensaje = "Modelo actualizado exitosamente";
        $this->limpiar();
    }

    public function eliminar($id){
        ModelosM::destroy($id);
        $this->mensaje = "Modelo eliminada exitosamente";
    }

    public function hab_edit($id){
        $this->edit = true;
        $this->id_editar = $id;
        $ConsultaModelos = ModelosM::find($id);
        $this->valor_edit = $ConsultaModelos->descripcion;
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
            'id_editar' => $this->id_editar,
            'nuevo' => $this->new
        ]);
    }
}
