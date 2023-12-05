<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class Crearvacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required|max:250',
        'imagen' => 'required|image|max:1024'

    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        //almacenando imagen
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        //Crear la vacante
        Vacante::create([
            'titulo' => $datos['titulo'], 
            'salario_id' => $datos['salario'], 
            'categoria_id' => $datos['categoria'], 
            'empresa' => $datos['empresa'], 
            'ultimo_dia' => $datos['ultimo_dia'], 
            'descripcion' => $datos['descripcion'], 
            'imagen' => $datos['imagen'], 
            'user_id' => auth()->user()->id,
        ]);

        //Crear un mensaje 
        session()->flash('mensaje','La vacante fue creada correctamente');

        //Redireccionar al usuario a las vacantes
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        //Consultar a la base de datos
        $salarios = Salario::all(); 
        $categoria = Categoria::all(); 

        return view('livewire.crearvacante',[
            'salarios' => $salarios,
            'categorias' => $categoria
        ]);
    }
}
