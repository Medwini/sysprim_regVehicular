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

        MarcasM::create(
            [
                "descripcion" => $this->valor
            ]
        );
        $this->mensaje = "Marca registrada exitosamente";
        $this->limpiar();
    }

    public function editar($id){

        $this->validate([   
            "valor_edit" => 'required|min:4|unique:marcas_m_s,descripcion'
        ]);

        $ConsultaMarcas = MarcasM::find($id);
        $ConsultaMarcas->descripcion = $this->valor_edit;
        $ConsultaMarcas->save();
        $this->mensaje = "Marca actualizada exitosamente";
        $this->limpiar();
    }

    public function eliminar($id){
        MarcasM::destroy($id);
        $this->mensaje = "Marca eliminada exitosamente";
    }

    public function hab_edit($id){
        $this->edit = true;
        $this->id_editar = $id;
        $ConsultaMarcas = MarcasM::find($id);
        $this->valor_edit = $ConsultaMarcas->descripcion;
    }

    public function cancelar_edit(){
        $this->limpiar();
        $this->mensaje = "";
    }

    public function render()
    {
        $marcas = MarcasM::all();
        return view('livewire.marcas', [
            'marcas' => $marcas,
            'edit' => $this->edit,
            'id_editar' => $this->id_editar,
            'nuevo' => $this->new
        ]);
    }
}
