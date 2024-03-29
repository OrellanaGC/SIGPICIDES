<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Solicitud;
use App\ComiteUsuario;
use DB;

class ComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $solicitud = Solicitud::where('id_proy', $id)->first();
        $id_comite = $proyecto->id_comite;
        $id_equipo = $proyecto->id_equipo;
        
        //Todos los usuarios
        $users = DB::select("SELECT * FROM users");
        $noMiembros = DB::select("SELECT * FROM users");
      

        //Omitir Miembros del comite 
        $miembrosComite = DB::select('SELECT * FROM comite_usuario WHERE id_comite = ?', [$id_comite]);

        foreach ($miembrosComite as $miembro) { 
            foreach($noMiembros as $user){ 
                if($user->id == $miembro->id_usuario){
                    unset($noMiembros[$user->id - 1]);
                }
            }
        }

        //Omitir Miembros del equipo
        $miembrosEquipo = DB::select('SELECT * FROM usuario_equipo_rol WHERE id_equipo = ?', [$id_equipo]);

        foreach ($miembrosEquipo as $miembro) { 
            foreach($noMiembros as $user){ 
                if($user->id == $miembro->id_usuario){
                    unset($noMiembros[$user->id - 1]);
                }
            }
        }
        //Omitir Otros roles. No Investigadores
        $noInvestigadores= DB::select('SELECT * FROM role_user WHERE role_id != ?', [4]);
  
        foreach ($noInvestigadores as $inv) { 
            foreach($noMiembros as $user){ 
                if($user->id == $inv->user_id){
                    unset($noMiembros[$user->id - 1]);
                }
            }
        }

          //Miembros del equipo 
            $miembros= DB::select("SELECT CU.id_usuario, U.name, RU.role_id, R.name as name1 FROM users U 
            JOIN comite_usuario CU ON U.id = CU.id_usuario
            JOIN role_user RU ON U.id = RU.user_id 
            JOIN roles R ON R.id = RU.role_id
            WHERE CU.id_comite = ?", [$id_comite]);
            
         
         //Roles
         $roles = DB::select('SELECT * FROM roles');

         $cantidad_miembros = DB::table('comite_usuario')->where('id_comite',[$id_comite])->count();
         $evaluaciones = DB::table('evaluacion')->where('id_solicitud',[$solicitud->id]);

         //Los que ya evaluaron la solicitud
         $evaluadores = DB::select("SELECT E.id_user, S.id, E.id FROM solicitud S
         JOIN proyecto P ON S.id_proy = P.id
         JOIN evaluacion E ON S.id = E.id_solicitud
         JOIN comite_de_evaluacion C ON P.id_comite = C.id
         WHERE C.id = ? AND E.id_user != ? AND E.id_user != ? ",[$id_comite, 2, 3]
         );

         //Retornar la vista
         return view ('evaluacion.comite', [
              'usuarios'=>$noMiembros,  
              'miembros'=>$miembros,
              'roles'=>$roles,
              'cantidad_miembros'=>$cantidad_miembros,
              'proyecto'=>$proyecto,
              'solicitud'=>$solicitud,
              'evaluaciones'=>$evaluaciones,
              'evaluadores'=>$evaluadores,
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $id_miembro = request('investigador');

        $proyecto = Proyecto::findOrFail($id);

        $id_comite = $proyecto->id_comite;

        $cantidad_miembros = DB::table('comite_usuario')->where('id_comite',[$id_comite])->count();

        if($cantidad_miembros < 3 ){

            DB::table('comite_usuario')->insert([
                'id_comite' => $id_comite,
                'id_usuario' =>$id_miembro,     
            ]);
    
            return redirect()->route('comite.index',[$id]);

        }else{

            return redirect()->route('comite.index',[$id]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuario, $id_proyecto)
    {
        $proyecto = Proyecto::findOrFail($id_proyecto);

        $id_comite = $proyecto->id_comite;

        DB::table('comite_usuario')->where('id_usuario', $id_usuario)->where('id_comite', $id_comite)->delete();
        return redirect()->route('comite.index',[$id_proyecto]);
    }
}
