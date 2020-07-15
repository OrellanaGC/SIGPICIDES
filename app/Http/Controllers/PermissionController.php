<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class PermissionController extends Controller
{
    public function index($user)
    {
        $tablas = DB::select(
            "SELECT * FROM tabla");

        $permisos = DB::select(
            "SELECT * FROM permissions");

        $permisos_usuario = DB::select(
            "SELECT p.id, p.name, p.id_tabla 
            FROM permissions p 
            JOIN permission_user u 
            ON p.id = u.permission_id 
            WHERE u.user_id = ?", [$user]);

        foreach ($permisos as $permiso) { 
            foreach($permisos_usuario as $pu) { 
                if($permiso->id == $pu->id){

                    unset($permisos[$permiso->id - 1]);

                }
            }
        }
        $data = User::all();
        return view ('simpleViews.permisos.listar', [
            'permisos'=>$permisos,
            "permisos_usuario" => $permisos_usuario,
            "data" => $data,
            "tablas" => $tablas,
            "user" => $user]);
    }

    public function store()
    {
        $user = request('id_usuario');
        $permission = request('id_permiso');

        $cantidad = DB::select(
            "SELECT COUNT(id) 
            FROM public.permission_user 
            WHERE user_id = ? AND permission_id = ?", [$user, $permission]);

        foreach($cantidad as $c){
            if($c->count == 0){
                DB::table('permission_user')->insert([
                    ['permission_id' => $permission, 'user_id' => $user]
                ]);
            }
        }
        return redirect()->route('permission.index', $user);
    }

    public function destroy()
    {
        $user = request('id_usuario');
        $permission = request('id_permiso');
        DB::table('permission_user')
        ->whereRaw("user_id = ? AND permission_id = ?", [$user, $permission])
        ->delete();
        return redirect()->route('permission.index', $user);
    }
}
