<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //$recursos=Recursos::take(3)->latest()->get();
        //return view ('simpleViews.recursos.listar', ['recursos'=>$recursos]);
        return view ('simpleViews.recursos.listar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=\App\Marca::all();
        $tiporec=\App\TipoDeRecursos::all();
        return view ('simpleViews.recursos.crear', [
            'marcas' => $marcas, 
            'tiporec' => $tiporec
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store()
    {
        //dump(request()->all());  //trae todo lo del formulario
        //$recurso= \DB::table('marca')->where('id', 1)->first(); Forma para hacer consultas
        //dd($recurso);
        request()->validate([
            'tipoRec'=> 'required',
            'nombre'=> 'required',
            'marca'=> 'required',
            'modelo'=> 'required',
            'descripcion'=> 'required'
        ]);
        $recurso= new \App\Recursos();
        $recurso->id_marca=1;
        $recurso->id_tipo=1;
        $recurso->nombre=request('nombre');
        
        $recurso->save();
        $detalleRecurso=new \App\DetalleDeRecurso();
        $detalleRecurso->id_recurso=$recurso->id;
        $detalleRecurso->modelo= request('modelo');
        $detalleRecurso->descripcion= request('descripcion');
        $detalleRecurso->save();
        return redirect('/recursos');
        //Recursos::create($validatedAttributes);
        //Luego crear su respectivo detalle consiguiendo el id del recurso creado
        //return redirect('/recursos');
        //$recurso= \DB::table('recurso')->where('id', $variable)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        //Buscar el recurso con el id de entrada
        $recurso=Recursos::findOrFail($id);
        //Buscar el detalle del recurso del recurso consultado
        //$detalleRecurso=detalleRecurso::...
        //Retornar la vista
        return view ('simpleViews.recursos.show', ['recurso'=>$recurso, 'detalle'=>$detalleRecurso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recurso= Recursos::find($id);
        $detalleRecurso= DetalleDeRecurso::find($id); 
        //return view ('simpleViews.recursos.editar',['recurso'=>$recurso, 'detalle'=>$detalleRecurso]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
        //Para actualizar
        $article->update($validatedAttributes); 

        public function update($id){
    //Persiste the edited resource
    $article= Article::find($id);
    $article->title= request('title');
    $article->excerp= request('excerp');
    $article->body= request('body');

    $article->save();
    return redirect('/articles/'. $article->id);
    //@method('PUT') 
}
        */

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
