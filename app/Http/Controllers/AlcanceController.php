<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alcance;

class AlcanceController extends Controller
{
    public function store(){
        request()->validate([
            'id_proy'=> 'required',
            'descripcion_alcance'=> 'required',
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_alcance.required' => "Describa el objetivo.",
        ]);

        $alcance = new Alcance();
        $alcance->id_proyecto = request('id_proy');
        $alcance->descripcion = request('descripcion_alcance');
        $alcance->save();

        return redirect()->route('proyecto.oai', [$alcance->id_proyecto]);
    }

    public function update($id){
        request()->validate([
            'id_proy'=> 'required',
            'descripcion_alcance'=> 'required',
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_alcance.required' => "Describa el objetivo.",
        ]);

        $alcance = Alcance::findOrFail($id);
        $alcance->descripcion = request('descripcion_alcance');
        $alcance->save();

        return redirect()->route('proyecto.oai', [$alcance->id_proyecto]);
    }

    public function destroy(){
        $alcance = Alcance::findOrFail(request('alcance'));
        $alcance->delete();
        return redirect()->route('proyecto.oai', [$alcance->id_proyecto]);
    }
}
