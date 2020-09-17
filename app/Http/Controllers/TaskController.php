<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Proyecto;
use App\UsuarioEquipoRol;
use App\Indicador;
use App\User;
use App\tareaUsuario;
use DB;

class TaskController extends Controller
{

    public function index($idProyecto)
    {   
        //hay que verificar si el proyecto que se esta llamando es uno en el que la persona logeada sea parte del equipo
        //Trayendo el id del equipo del proyecto de la base de datos
        //Si el equipo existe sigue el flujo, sino se muestra un not found
        if ($idEquipo= Proyecto::select('id_equipo')->where('id',$idProyecto)->first()) {
            //Obteniendo datos del usuario logeado
            $idUsuarioLogeado=auth()->user()->id;
            //dd($idUsuarioLogeado);            
            //dd($idEquipo);
            //Comprobando si el usuario equipo rol existe (id del equipo y id del usuario logeado)
            $usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $idEquipo->id_equipo)->where('id_usuario', $idUsuarioLogeado)->firstOr(function(){
                abort(403);
            });
            //Traer los indicadores del proyecto seleccionado
            $indicadores= Indicador::where('id_proy',$idProyecto)->get();
            //Traer los miembros del equipo del proyecto seleccionado
            $miembrosEquipo= User::whereRaw('id in (select id_usuario from usuario_equipo_rol where id_equipo= ?)',[$idEquipo->id_equipo])->get();
            //dd($indicadores);
            //Retornar vista
            return view('proyectoViews.tareas.gantt',['idProyecto'=>$idProyecto, 'indicadores'=>$indicadores, 'miembrosEquipo'=>$miembrosEquipo]);

        }
        else {
            abort(404);
        }
        

    }

    public function store(Request $request){
        //Se verifica si existe el idProyecto recibido y si pertenece al usuario logeado
        //Se verifica que el proyecto exista en base
        if ($idEquipo= Proyecto::select('id_equipo')->where('id', $request->idProyecto)->first()) {
            //Obteniendo el id del usuario que guardo la tarea
            $idUsuarioLogeado=$request->idUser;
            //$usa=auth()->user()->id;
            //Entrara en el proceso si el usuario logeado pertenece al equipo del proyecto seleccionado
            if($usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $idEquipo->id_equipo)->where('id_usuario', $idUsuarioLogeado)->first()){
                $task = new Task(); 
                $task->text = $request->text;
                // $task->rrhh = $request->rrhh;
                $task->start_date = $request->start_date;
                $task->duration = $request->duration;
                $task->progress = $request->has("progress") ? $request->progress : 0;
                $task->parent = $request->parent;
                $task->sortorder = Task::max("sortorder") + 1;
                $task->id_proyecto = $request->idProyecto;
                $task->type;
                $task->readonly;
                $task->modificable;
                //$task->save();
                
                /**********Guardar asignacion de tareas a miembros del equipo***************/
                //Hacer el proceso en caso haya seleccionado al menos un miembro
                
                if($request->miembros){      
                    //$usa=auth()->user()->id;
                    $miembros= $request->miembros;
                    //$resultado = str_replace ( "[", '', $miembros);
                    //$resultado= str_replace ( "]", '', $resultado);
                    $resultado= str_replace ( '"', '', $miembros);
                    //$resultado = explode(',', $resultado);
                    //$resultado[1]= str_replace('"','', $resultado[1] );
                    //$miembros_ar = explode(",", $miembros);   
                    // foreach ($miembro as $idMiembro) {
                    //     //Verificar que los valores de los id's recibidos sean de Usuarios que pertenencen al equipo del proyecto
                    //     if($usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $idEquipo->id_equipo)->where('id_usuario', $idMiembro*1)->first()){
                    //         $tareaDeUsuario= new tareaUsuario();
                    //         $tareaDeUsuario->id_usuario=$idMiembro;
                    //         $tareaDeUsuario->id_task=$task->id;
                    //         $tareaDeUsuario->save();                            
                    //     }
                    // }
                }
                /**********Guardar asignacion de tareas a indicadores***************/
                //Hacer el proceso en caso haya seleccionado al menos un inidicador
                // if(request()->indicador){
                //     foreach (request()->indicador as $idIndicador) {
                //         //Verificar que los indicadores recibidos pertenezcan al proyecto seleccionado
                //         if($indicador= Indicador::where('id_proy',$idProyecto)->where('id', $idIndicador)->first()){
                //             $indicadorTarea= new DB::table('task_indicador');                            
                //             $indicadorTarea->id_indicador=$idIndicador;
                //             $indicadorTarea->id_task=$task->id;
                //             $indicadorTarea->save();                            
                //         }
                //     }
                // }
                return response()->json([
                "action"=> "inserted",
                "tid" => $task->id,
                "String recibido"=> $miembros,
                "tipo del String recibido"=>gettype($miembros),
                "miembros1"=>gettype($resultado),
                "array generado"=>$resultado,
                "valor [1] array"=>$resultado[1],
                "tipo del valor [1]"=>gettype($resultado[1]),
                "valor [1] parsed Int"=>(int)$resultado[1],
                "valor [0] array"=>$resultado[0],
                "tipo del valor [0]"=>gettype($resultado[0]),
                "valor [0] parsed Int"=>(int)$resultado[0],
                "indicadors"=>$request->indicadores,
                //"miembros"=>$miembros_ar[1],
                ]);
            }
        } 
    }       

    public function update($id, Request $request){
        $task = Task::find($id);
 
        $task->text = $request->text;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
        $task->progress = $request->has("progress") ? $request->progress : 0;
        $task->parent = $request->parent;
 
        $task->save();
 
        if($request->has("target")){
            $this->updateOrder($id, $request->target);
        }

        return response()->json([
            "action"=> "updated"
        ]);
    }
 
    private function updateOrder($taskId, $target){
        $nextTask = false;
        $targetId = $target;
     
        if(strpos($target, "next:") === 0){
            $targetId = substr($target, strlen("next:"));
            $nextTask = true;
        }
     
        if($targetId == "null")
            return;
     
        $targetOrder = Task::find($targetId)->sortorder;
        if($nextTask)
            $targetOrder++;
     
        Task::where("sortorder", ">=", $targetOrder)->increment("sortorder");
     
        $updatedTask = Task::find($taskId);
        $updatedTask->sortorder = $targetOrder;
        $updatedTask->save();
    }
    
    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
 
        return response()->json([
            "action"=> "deleted"
        ]);
    }
}