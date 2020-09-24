@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar solicitudes 
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="card-title"><b>Solicitudes Nuevas</b></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="card-title"><b>Solicitudes en la primera etapa</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    @foreach ($solicitudes as $soli)
                                        @if ($soli->etapa == 1)
                                        <tr>
                                            <td>
                                                <p>{{ $soli->nombre }}</p> 
                                            </td>
                                            <td width="5%" align="right">
                                                <div class="btn-group" role="group">
                                                    <a title="Comite de Evaluacion" type="button" class="btn btn-info btn-sm btn-icon btn-round" href="{{ route('comite.index', [$soli->id_proy])}}">
                                                    <i class="tim-icons icon-single-02"></i>
                                                    </a>
                                                    <a title="Eliminar" type="button" class="btn btn-warning btn-sm btn-icon btn-round" href="">
                                                        <i class="tim-icons icon-simple-remove"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>  
                                        @endif                      
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="card-title"><b>Solicitudes en la segunda etapa</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    @foreach ($solicitudes as $soli)
                                    @if ($soli->etapa == 2)
                                    <tr>
                                        <td>
                                            <p>{{ $soli->nombre }}</p> 
                                        </td>
                                        <td width="5%" align="right">
                                            <div class="btn-group" role="group">
                                                <a title="Comite de Evaluacion" type="button" class="btn btn-info btn-sm btn-icon btn-round" href="{{ route('comite.index', [$soli->id_proy])}}">
                                                <i class="tim-icons icon-single-02"></i>
                                                </a>
                                                <a title="Eliminar" type="button" class="btn btn-warning btn-sm btn-icon btn-round" href="">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr> 
                                    @endif                       
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="card-title"><b>Solicitudes Evaluadas</b></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="card-title"><b>Solicitudes en la primera etapa</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($solicitudes_E as $soli)
                                        @if ($soli->etapa == 1)
                                        <tr>
                                            <td>
                                                <p>{{ $soli->nombre }}</p> 
                                            </td>
                                            <td>
                                                <p>{{ $soli->estado }}</p> 
                                            </td>
                                            <td width="5%" align="right">
                                                
                                            </td>
                                        </tr>    
                                        @endif                    
                                        @endforeach
                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="card-title"><b>Solicitudes en la segunda etapa</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($solicitudes_E as $soli)
                                        @if ($soli->etapa == 2)
                                        <tr>
                                            <td>
                                                <p>{{ $soli->nombre }}</p> 
                                            </td>
                                            <td>
                                                <p>{{ $soli->estado }}</p> 
                                            </td>
                                            <td width="5%" align="right">
                                                
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
        </div>
    </div>
</div>

@endsection