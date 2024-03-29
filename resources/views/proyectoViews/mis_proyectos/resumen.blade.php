@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Primera etapa
@endsection
@section('content')
<script src="{{ asset('black') }}/js/oai.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p><b>Tiempo:</b> </p>
                    </div>
                    <div class="col-6 text-right">
                        {{$tiempo->estimado}} 
                        @if($tiempo->estimado != 1)
                            semanas 
                        @else 
                            semana 
                        @endif
                    </div>
                </div>
                
                <div class="progreso_container">
                    <div class="progress">
                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{($tiempo->real/$tiempo->estimado)*100}}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            {{$tiempo->real}} 
                            @if($tiempo->real != 1)
                                semanas 
                            @else 
                                semana 
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <p><b>Progreso estimado:</b> </p>
                    </div>
                    <div class="col-6 text-right">
                        {{$total->count}} 
                        @if ($finalizados->count != 1)
                            indicadores
                        @else
                            indicador
                        @endif
                    </div>
                </div>
                <div class="progreso_container">
                    <div class="progress">
                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{($estimados/$total->count)*100}}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            {{$estimados}} 
                            @if ($estimados != 1)
                                indicadores
                            @else 
                                indicador
                            @endif 
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <p><b>Progreso real:</b> </p>
                    </div>
                    <div class="col-6 text-right">
                        {{$total->count}} 
                        @if ($finalizados->count != 1)
                            indicadores
                        @else
                            indicador
                        @endif
                    </div>
                </div>
                <div class="progreso_container">
                    <div class="progress">
                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{($finalizados->count/$total->count)*100}}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            {{$finalizados->count}}
                            @if ($finalizados->count != 1)
                                indicadores
                            @else
                                indicador
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">            
            <div class="card-body">                
                <div class="d-flex justify-content-between">
                    <h3>
                        Información general
                    </h3>
                    <!--TODO alejandro modificar if segun sea miembro o coordinador-->
                    @if ($rol=='Coordinador')
                    <button class="btn btn-primary text-center" data-toggle="modal" data-target="#estadoProyModal">
                        Cambiar Estado
                    </button>    
                    @endif                    
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="estadoProyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-lg">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Estado del proyecto</h3>                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                <div class="modal-body">
                                    <form action="{{route('proyecto.CambioEstado', $proyecto->id)}}" method="post" id="formCambiarEstado">
                                        @csrf
                                        <div class=" d-flex flex-column">
                                            <p class="text-center font-weight-bold">Cambiar estado:</p>
                                            <select name="estadoProy" id="estadoProyResumen">
                                                @foreach ($estados as $estado)
                                                @if ($proyecto->id_estado==$estado->id)
                                                    <option selected value="{{$estado->id}}">{{$estado->estado}}</option>    
                                                @else
                                                    <option value="{{$estado->id}}">{{$estado->estado}}</option>    
                                                @endif                                                
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" form="formCambiarEstado">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <th>
                                    Tipo:
                                </th>
                                <td colspan="5">
                                    {{$t->nombre}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Subtipo:
                                </th>
                                <td colspan="5">
                                    {{$st->nombre}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Tema:
                                </th>
                                <td colspan="5">
                                    {{$proyecto->tema}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Nombre:
                                </th>
                                <td colspan="5">
                                    {{$proyecto->nombre}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Descripción:
                                </th>
                                <td colspan="5">
                                    {{$proyecto->descripcion}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Justificación:
                                </th>
                                <td colspan="5">
                                    {{$proyecto->justificacion}}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table">
                            <tr>
                                <th>
                                    Cantidad de miembros:
                                </th>
                                <td class="text-right">
                                    {{$equipo->miembros}}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>
                                    Duración:
                                </th>
                                <td class="text-right">
                                    {{$proyecto->duracion}}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>
                                    Costo:
                                </th>
                                <td class="text-right">
                                    $ {{$proyecto->costo}}
                                </td>
                                <td></td>
                            </tr>
                        </table>
                        <hr>
                        <h3 class="text-center font-weight-bold">ESTADO DEL PROYECTO:</h3>
                        @if ($proyecto->id_estado==3)
                            <h2 class="text-center text-danger text-uppercase">{{$proyecto->estado}}</h2>    
                        @elseif($proyecto->id_estado==2)
                            <h2 class="text-center text-success text-uppercase">{{$proyecto->estado}}</h2>    
                        @else
                            <h2 class="text-center text-primary text-uppercase">{{$proyecto->estado}}</h2>    
                        @endif
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="objetivosCard">
            <div class="card-header ">
                <h4>
                    Objetivos
                </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($objetivos as $objetivo)
                    <tr>
                        <td class="text-justify">
                            <i class="tim-icons icon-compass-05"></i> {{$objetivo->descripcion}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="alcancesCard">
            <div class="card-header ">
                <h4>
                    Alcances
                </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($alcances as $alcance)
                    <tr>
                        <td class="text-justify">
                            <i class="tim-icons icon-compass-05"></i> {{$alcance->descripcion}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="indicadoresCard">
            <div class="card-header ">
                <h4>
                    Indicadores
                </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($indicadores as $indicador)
                    <tr>
                        <td class="text-justify">
                            <i class="tim-icons icon-sound-wave"></i> {{$indicador->detalle}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header ">
                Recursos
            </div>
            <div class="card-body">
                <div class="card-body">  
                    
                    <table width='100%' class="table">
                        <tr>
                            <th width='30%'>Recursos</th>
                            <th width='30%'>Cantidad</th>
                            <th width='40%'>Detalle</th>
                        </tr>
                        @foreach($recursosProy as $rec)
                        <tr>                     
                            <td>
                                <i class="tim-icons icon-planet"></i>
                                &nbsp;{{ $rec->nombre }}
                            </td> 
                            <td>
                                {{ $rec->cantidad }}
                            </td>  
                            <td>
                                {{ $rec->detalle }}
                            </td>                            
                        </tr>
                        @endforeach
                    </table>
                    
                    <br>
                </div>
            </div>
        </div> 
    </div>
    @if ($solicitud->etapa==2 && ($solicitud->id_estado==6 || $solicitud->id_estado==8 || $solicitud->id_estado==7))
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Factibilidad</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td><b>Factibilidad técnica</b></td>
                        
                        <td class="text-justify">{{$factibilidad->tecnica}}</td>
                    </tr>    
                    <tr>
                        <td><b>Factibilidad económica</b></td>

                        <td class="text-justify">{{$factibilidad->economia}}</td>
                    </tr> 
                    <tr>
                        <td><b>Factibilidad financiera</b></td>

                        <td class="text-justify">{{$factibilidad->financiera}}</td>
                    </tr> 
                    <tr>
                        <td><b>Factibilidad operativa</b></td>

                        <td class="text-justify">{{$factibilidad->operativa}}</td>
                    </tr> 
                    <tr>
                        <td><b>Factibilidad extra</b></td>

                        <td class="text-justify">{{$factibilidad->fac_extra}}</td>
                    </tr>                 
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <h3>Equipo de investigación</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Rol de proyecto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($miembros as $miembro) 
                            <tr>                     
                                <td> {{ $miembro->name }} </td>
                                <td> 
                                    <select required class="form-control selectorWapis" value="" id="rol" name="rol" disabled>
                                        <option value="" selected disabled hidden >Seleccionar rol</option>
                                        @foreach ($roles as $rol)
                                            @if($miembro->id_rol == $rol->id)
                                                <option style="color: black !important;" selected>{{ $rol->name }}</option>
                                            @else
                                                <option style="color: black !important;">{{ $rol->name }}</option>
                                            @endif
                                        @endforeach
                                    </select> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" align="center">
                <h1>EVALUACI&Oacute;N FINAL</h1>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" align="center">
                <h3>Comentarios de primer etapa</h3>
            </div>
        </div>
    </div>
    @foreach ($evaluaciones as $eva)        
        @if ($eva->etapa==1)
            @foreach ($evaluadores as $miembro) 
                @if ( $eva->id_user == $miembro->id_usuario)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center"><b>{{ $miembro->nombre }}</b></h3>           
                                <h4 class="text-center"><b>{{ $eva->estado }}</b></h4>
                            <p class="text-justify eva-box"><b>Comentario: </b> {{ $eva->comentario }} </p>
                            <br>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif        
    @endforeach
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" align="center">
                <h3>Comentarios de segunda etapa</h3>
            </div>
        </div>
    </div>
    @foreach ($evaluaciones as $eva)        
        @if ($eva->etapa==2)
            @foreach ($evaluadores as $miembro) 
                @if ( $eva->id_user == $miembro->id_usuario) 
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center"><b>{{ $miembro->nombre }}</b></h3>           
                                <h4 class="text-center"><b>{{ $eva->estado }}</b></h4>
                            <p class="text-justify eva-box"><b>Comentario: </b> {{ $eva->comentario }} </p>
                            <br>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif        
    @endforeach

    <div class="col-md-12">
        <tr>
            <td width="50%" align="right">
                <div class="container menuF-container">
                    <input type="checkbox" id="toggleF">
                    <label for="toggleF" class="buttonF"></label>
                    <nav class="navF">                                                  
                        <a href="{{ route('proyecto.resumen', [$proyecto->id])}}">Resumen</a>  
                        <a href="{{ route('tareas_avance.index', [$proyecto->id])}}">Planificación</a>
                        <a href="{{ route('indicadores.index', [$proyecto->id])}}">Indicadores</a>
                    </nav>
                </div> 
            </td>
        </tr>
    </div> 
</div>
@endsection
