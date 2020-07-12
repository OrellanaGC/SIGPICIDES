@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Usuarios
@endsection
@section('content')
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Administración de Usuarios</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--NUEVO RECURSO-->
                    <div class="col-sm-2">
                        <a role="button" class="btn btn-primary" href="{{ route('recursos.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>
                        </a>
                    </div>
                    <!--Dropdown para recurso-->
                    <div class="container list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($data as $user)                          
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                    </td>
                                </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer"><br></div>
            </div>
        </div>
    </div>
</div>
@endsection