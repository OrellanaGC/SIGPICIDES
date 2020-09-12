@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Roles
@endsection
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Gestion de Roles</b></h2>
                    </div>
                    <div class="col-sm-3 text-right">
                        <a role="button" class="btn btn-primary" href="{{ route('roles.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th class="text-center">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $rol) 
                                @if($rol->tipo_rol)
                                <tr>                     
                                    <td width="80%" id={{$rol->id}} onMouseOver="ResaltarFila({{$rol->id}});" onMouseOut="RestablecerFila({{$rol->id}}, '')" onClick="CrearEnlace('{{ route('roles.show', $rol->id)}}');">
                                        {{$rol->name}}
                                    </td>
                                    <form method="POST" id="formulario{{$rol->id}}" action="{{route('roles.destroy', $rol->id)}}" >
                                        <td width="15%">
                                            <div class="btn-group" role="group">
                                                <a title="Configurar permisos" type="button" href="{{ route('roles.permissions', $rol->id)}}" class="btn btn-default btn-sm btn-icon btn-round">
                                                    <i class="tim-icons icon-key-25"></i>
                                                </a>
                                                <a type="button" href="{{ route('roles.edit', $rol->id)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button @if ($rol->id < 5) disabled @endif type="button" onClick="" style="pointer-events: auto;" title="No se puede eliminar un rol primario" class="btn btn-warning btn-sm btn-icon btn-round ">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button> 
                                            </div>
                                        </td>
                                    </form>
                                    <td width="5%">
                                        @isset($role)
                                        @if ($role->id == $rol->id)
                                        <i class="tim-icons icon-double-right"></i>
                                        @endif
                                        @endisset
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('opcion')
</div>
@endsection

<script src="sweetalert2.all.min.js"></script>
<script langiage="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#9c9c9c';
    }
    // RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
    function RestablecerFila(id_fila, color) {
        document.getElementById(id_fila).style.backgroundColor = color;
    }
    // CONVERTIR LAS FILAS EN LINKS
    function CrearEnlace(url) {
        location.href=url;
    }
    require("sweetalert");
    function confirmar(valor){
        //ruta.concat(variable,")}}");
        swal({
            title: "¿Eliminar registro?",
            text: "Esta acción es irreversible.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Registro eliminado", {
                    icon: "success",
                });
                document.getElementById("formulario"+valor).submit();
            } else {
                swal("Eliminación cancelada");
            }
        });
    }
    
    
</script>