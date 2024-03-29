@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Indicadores
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cuantitativo-tab" data-toggle="pill" href="#cuantitativo" role="tab" aria-controls="cuantitativo" aria-selected="false">Cuantitativos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cualitativo-tab" data-toggle="pill" href="#cualitativo" role="tab" aria-controls="cualitativo" aria-selected="false">Cualitativos</a>
                    </li>
                </ul>
                <p class="text-danger">Por defecto todos los indicadores son cualitativos</p>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="pills-home-tab">
                         <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                    
                            @foreach ($indicadores as $indicador)
                        
                            <tr>
                                <td>{{$indicador->detalle}}</td>
                                @if($indicador->tipo)
                                    <td>Cuantitativo</td>
                                @else
                                    <td>Cualitativo</td>
                                @endif                
                                <td>
                                    @if (!$indicador->modificable || $lider)
                                        <a class="btn btn-success btn-icon btn-round" href="{{route('indicador.general', $indicador->id)}}"><i class="tim-icons icon-double-right"></i></a>
                                    @endif
                                </td>
                                
                            </tr>
                            @endforeach 
                        </table>
                                      
                    </div>
                    
                    <div class="tab-pane fade" id="cuantitativo" role="tabpanel" aria-labelledby="cuantitativo-tab">                    
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                            @foreach ($indicadores as $indicador)
                                @if($indicador->tipo)
                                    <tr>
                                        <td>{{$indicador->detalle}}</td>
                                        <td>Cuantitativo</td>
                                        <td>
                                            @if (!$indicador->modificable || $lider)
                                                <a class="btn btn-success btn-icon btn-round" href="{{route('indicador.general', $indicador->id)}}"><i class="tim-icons icon-double-right"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>                    
                    </div>
                    
                    
                    <div class="tab-pane fade" id="cualitativo" role="tabpanel" aria-labelledby="cualitativo-tab">
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                            @foreach ($indicadores as $indicador)
                                @if(!$indicador->tipo)
                                <tr>
                                    <td>{{$indicador->detalle}}</td>
                                    <td>Cualitativo</td>
                                    <td>
                                        @if (!$indicador->modificable || $lider)
                                            <a class="btn btn-success btn-icon btn-round" href="{{route('indicador.general', $indicador->id)}}"><i class="tim-icons icon-double-right"></i></a>
                                        @endif
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
    <table width="100%">
        <tr>
            <td width="50%">
                <a class="btn btn-primary" href="{{ route('proyecto.resumen', [$proyecto->id]) }}">
                    Resumen
                </a>
            </td>
            <td width="50%" align="right">
                <a class="btn btn-primary" href="{{ route('tareas_avance.index', [$proyecto->id]) }}">
                    planificaci&oacuten
                </a>
            </td>
        </tr>
    </table>
            
</div>
        @endsection
        