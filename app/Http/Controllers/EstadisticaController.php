<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EstadisticaController extends Controller
{
    public function general(){
		$role = DB::SELECT(
			"SELECT RU.role_id FROM userS U JOIN role_user RU 
			ON U.id = RU.user_id WHERE U.id = ?", [auth()->user()->id]
		)[0];

		if($role->role_id != 1 && $role->role_id != 2 && $role->role_id != 3){
			abort(403);
		}

    	$recursos = DB::SELECT(
    		"SELECT R.nombre, SUM(RPP.cantidad) FROM recurso R LEFT JOIN
    		recursos_por_proy RPP ON R.id = RPP.id_recurso
    		GROUP BY R.id"
    	);

    	$marcas = DB::SELECT(
    		"SELECT M.nombre, SUM(RPP.cantidad) FROM marca M JOIN
			recurso R ON M.id = R.id_marca LEFT JOIN
    		recursos_por_proy RPP ON R.id = RPP.id_recurso
    		GROUP BY M.id"
    	);

    	$tipo_recurso = DB::SELECT(
    		"SELECT T.nombre, SUM(RPP.cantidad) FROM tipo_de_recurso T JOIN
			recurso R ON T.id = R.id_tipo LEFT JOIN
    		recursos_por_proy RPP ON R.id = RPP.id_recurso
    		GROUP BY T.id"
    	);

    	$tipo_investigacion = DB::SELECT(
			"SELECT TDI.nombre, COUNT(P.id) FROM tipo_de_investigacion TDI JOIN
			subtipo_de_investigacion SDI ON SDI.id_tipo = TDI.id LEFT JOIN
			proyecto P ON SDI.id = P.id_subtipo					
			GROUP BY TDI.id"
			//WHERE SDI.id_tipo = 2
			////WHERE P.id_estado = 3
			//WHERE P.id_subtipo = 1
		);
    	$subtipo_investigacion = DB::SELECT(
    		"SELECT SDI.nombre, COUNT(P.id) FROM subtipo_de_investigacion SDI LEFT JOIN
			proyecto P ON SDI.id = P.id_subtipo
			GROUP BY SDI.id"
    	);

		//dd($recursos, $marcas, $tipo_recurso, $tipo_investigacion, $subtipo_investigacion);
		
		$tiposProy=DB::table('tipo_de_investigacion')->get();
		$subtiposProy=DB::table('subtipo_de_investigacion')->get();
		$estados=DB::table('estado_de_proy')->get();

    	return view("statsViews.index", [
			'recursos' => $recursos,
			'marcas' => $marcas,
			'tipo_recurso' => $tipo_recurso,
			'tipo_investigacion' => $tipo_investigacion,
			'subtipo_investigacion' => $subtipo_investigacion,
			'tiposProy' => $tiposProy,
			'subtiposProy' => $subtiposProy,
			'estados' => $estados,
			'estadoElegido'=>0
		]);
	}
	
	public function statsFiltrado(Request $request)
    {
		$role = DB::SELECT(
			"SELECT RU.role_id FROM userS U JOIN role_user RU 
			ON U.id = RU.user_id WHERE U.id = ?", [auth()->user()->id]
		)[0];

		if($role->role_id != 1 && $role->role_id != 2 && $role->role_id != 13){
			abort(403);
		}
		//dd($request->request);
		$recursos = DB::SELECT(
    		"SELECT R.nombre, SUM(RPP.cantidad) FROM recurso R LEFT JOIN
    		recursos_por_proy RPP ON R.id = RPP.id_recurso
    		GROUP BY R.id"
    	);

    	$marcas = DB::SELECT(
    		"SELECT M.nombre, SUM(RPP.cantidad) FROM marca M JOIN
			recurso R ON M.id = R.id_marca LEFT JOIN
    		recursos_por_proy RPP ON R.id = RPP.id_recurso
    		GROUP BY M.id"
    	);

    	$tipo_recurso = DB::SELECT(
    		"SELECT T.nombre, SUM(RPP.cantidad) FROM tipo_de_recurso T JOIN
			recurso R ON T.id = R.id_tipo LEFT JOIN
    		recursos_por_proy RPP ON R.id = RPP.id_recurso
    		GROUP BY T.id"
		);
		$subtipo_investigacion = DB::SELECT(
    		"SELECT SDI.nombre, COUNT(P.id) FROM subtipo_de_investigacion SDI LEFT JOIN
			proyecto P ON SDI.id = P.id_subtipo
			GROUP BY SDI.id"
    	);
        $tiposProy=DB::table('tipo_de_investigacion')->get();
        $subtiposProy=DB::table('subtipo_de_investigacion')->get();;
		//Traer los proyectos segun los filtros indicados
		//Si el estado de proyecto es 0 no importarta el estado del proyecto
		if($request->estadoProy==0){
			//Si tisubti es 0 quiere decir que hay que traer todos los proyectos
			if($request->tisubti==0){
				$tipo_investigacion = DB::SELECT(
					"SELECT TDI.nombre, COUNT(P.id) FROM tipo_de_investigacion TDI JOIN
					subtipo_de_investigacion SDI ON SDI.id_tipo = TDI.id LEFT JOIN
					proyecto P ON SDI.id = P.id_subtipo					
					GROUP BY TDI.id"
				);
			}
			else{
				//Si es 1 quiere decir que se graficaran todos los subtipos del tipo que se escogio
				if($request->tisubti==1){					
					$tipo_investigacion=DB::select(DB::raw(
						"SELECT SDI.nombre, COUNT(P.id) FROM tipo_de_investigacion TDI JOIN
						subtipo_de_investigacion SDI ON SDI.id_tipo = TDI.id LEFT JOIN
						proyecto P ON SDI.id = P.id_subtipo
						where TDI.nombre= '$request->nombre'
						GROUP BY SDI.id"
					));
				}
				//Si es 2 quiere decir que solo se mostrara la grafica del subtipo que eligio
				if($request->tisubti==2){
					$tipo_investigacion = DB::SELECT(
						"SELECT SDI.nombre, COUNT(P.id) FROM tipo_de_investigacion TDI JOIN
						subtipo_de_investigacion SDI ON SDI.id_tipo = TDI.id LEFT JOIN
						proyecto P ON SDI.id = P.id_subtipo
						WHERE SDI.nombre = '$request->nombre'
						GROUP BY SDI.id", 
					);
				}           				
			} 			
		}else{
			//Si tisubti es 0 quiere decir que hay que traer todos los proyectos
			if($request->tisubti==0){
				$tipo_investigacion = DB::SELECT(
					"SELECT TDI.nombre, COUNT(P.id) FROM tipo_de_investigacion TDI JOIN
					subtipo_de_investigacion SDI ON SDI.id_tipo = TDI.id LEFT JOIN
					proyecto P ON SDI.id = P.id_subtipo	
					WHERE P.id_estado = $request->estadoProy
					GROUP BY TDI.id"
				);
			}
			else{
				//Si es 1 quiere decir que se graficaran todos los subtipos del tipo que se escogio
				if($request->tisubti==1){
					$tipo_investigacion = DB::SELECT(
						"SELECT SDI.nombre, COUNT(P.id) FROM tipo_de_investigacion TDI JOIN
						subtipo_de_investigacion SDI ON SDI.id_tipo = TDI.id LEFT JOIN
						proyecto P ON SDI.id = P.id_subtipo						
						WHERE TDI.nombre = '$request->nombre'
						AND P.id_estado = $request->estadoProy
						GROUP BY SDI.id"
					);
				}
				//Si es 2 quiere decir que solo se mostrara la grafica del subtipo que eligio
				if($request->tisubti==2){
					$tipo_investigacion = DB::SELECT(
						"SELECT SDI.nombre, COUNT(P.id) FROM tipo_de_investigacion TDI JOIN
						subtipo_de_investigacion SDI ON SDI.id_tipo = TDI.id LEFT JOIN
						proyecto P ON SDI.id = P.id_subtipo
						WHERE SDI.nombre = '$request->nombre'
						AND P.id_estado = $request->estadoProy
						GROUP BY SDI.id"
					);
				}
			}
		}
               
        //dd($request->request);
        $estados=DB::table('estado_de_proy')->get();
        //Proyectos que apareceran en el buscador
        $proyectosBuscador=DB::table('proyecto')->get();     
        return view('statsViews.index', [ 
        	'recursos' => $recursos,
			'marcas' => $marcas,
			'tipo_recurso' => $tipo_recurso,
			'tipo_investigacion' => $tipo_investigacion,
			'subtipo_investigacion' => $subtipo_investigacion,
			'tiposProy' => $tiposProy,
			'subtiposProy' => $subtiposProy,
			'estados' => $estados,
			'estadoElegido'=>$request->estadoProy,
			'nombreElegido'=>$request->nombre,
			'tisubtiElegido'=>$request->tisubti,		
		]);
    }

    public function proyectos(){
		$role = DB::SELECT(
			"SELECT RU.role_id FROM userS U JOIN role_user RU 
			ON U.id = RU.user_id WHERE U.id = ?", [auth()->user()->id]
		)[0];

		if($role->role_id != 1 && $role->role_id != 2 && $role->role_id != 13){
			abort(403);
		}
        $proyectos = DB::SELECT(
            "SELECT nombre, duracion AS estimado, date_part('d', NOW() - created_at)/7 AS real FROM proyecto"
        );
        $mayor = DB::SELECT("SELECT MAX(duracion) AS real FROM proyecto")[0]->real;

        return view("statsViews.stats_por_proy", [
            "proyectos" => $proyectos,
            "mayor" => $mayor
        ]);
    }
}
