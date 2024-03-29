@extends('layouts.app',['pageSlug' => 'enviar_solicitud'])
@section('title')
Nueva investigación
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Registrar solicitud de investigación</b></h2>
                    </div>
                    <div class="col-md-4 text-right">
                        <p style="color:red">Datos requeridos: *</p><br>
                    </div>
                </div>
            </div>
            <form class="form" method="POST" action="{{route('solicitud.store')}}">
                @csrf                                    
                <div class="card-body">
                    <div class="row">                        
                        <div class="col-md-12 input-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-atom"></i>
                                </div>
                            </div>
                            <input maxlength="1024" required type="text" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre de la investigación *') }}">
                            @include('alerts.feedback', ['field' => 'nombre'])
                        </div>
                        
                        <div class="col-md-12 input-group{{ $errors->has('tema') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-atom"></i>
                                </div>
                            </div>
                            <input maxlength="1024" required type="text" name="tema" class="form-control{{ $errors->has('tema') ? ' is-invalid' : '' }}" placeholder="{{ __('Tema de la investigación *') }}">
                            @include('alerts.feedback', ['field' => 'tema'])
                        </div>
                        
                        <div class="col-md-12 input-group{{ $errors->has('tipoRec') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select required class="form-control selectorWapis" id="selector1" name="tipoRec">
                                <option value="" selected disabled hidden>Tipo de investigación *</option>
                                @foreach ($tiposinv as $tipo)
                                @if (old('tipoRec')==$tipo->id)                                     
                                <option style="color: black !important;" value="{{$tipo->id}}" selected>{{ $tipo->nombre }}</option>
                                @else
                                <option style="color: black !important;" value="{{$tipo->id}}">{{ $tipo->nombre }}</option>
                                @endif   
                                
                                @endforeach
                            </select>   
                            @include('alerts.feedback', ['field' => 'tipoRec'])                    
                        </div>
                        
                        <div class="col-md-12 input-group {{ $errors->has('subtipo') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend" style="display:none" id="prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select required class="form-control selectorWapis" id="selector2" name="subtipo" style="display:none">
                                <option value="">Subtipo de investigación *</option>
                                @foreach($sub_tipos as $subtipo)
                                <option style="color: black !important;" value="{{$subtipo->id}}" 
                                    class="{{$subtipo->id_tipo}}">{{$subtipo->nombre}}
                                </option>
                                @endforeach
                            </select>     
                            @include('alerts.feedback', ['field' => 'subtipo'])                       
                        </div>

                        <div class="col-md-12 input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                            <textarea required class="inputArea" maxlength="900" rows="6" name="descripcion" placeholder="Describa su proyecto *"></textarea>
                            @include('alerts.feedback', ['field' => 'descripcion'])
                        </div>    

                        <div class="col-md-12 input-group{{ $errors->has('justificacion') ? ' has-danger' : '' }}">
                            <textarea required class="inputArea" maxlength="900" rows="6" name="justificacion" placeholder="Justificación del proyecto *"></textarea>
                            @include('alerts.feedback', ['field' => 'justificacion'])
                        </div> 

                        <div class="col-md-12 input-group{{ $errors->has('resultados') ? ' has-danger' : '' }}">
                            <textarea rows="6" required class="inputArea" maxlength="900" name="resultados" placeholder="Resultados esperados del proyecto *"></textarea>
                            @include('alerts.feedback', ['field' => 'resultados'])
                        </div> 

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 input-group{{ $errors->has('duracion') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-calendar-60"></i>
                                        </div>
                                    </div>
                                    <input min="0" type="number" required name="duracion" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Duración en semanas *') }}">
                                    @include('alerts.feedback', ['field' => 'duracion'])
                                </div>

                                <div class="col-md-4 input-group{{ $errors->has('miembros') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-single-02"></i>
                                        </div>
                                    </div>
                                    <input min="0" type="number" required  name="miembros" class="form-control{{ $errors->has('miembros') ? ' is-invalid' : '' }}" placeholder="{{ __('Cantidad de miembros *') }}">
                                    @include('alerts.feedback', ['field' => 'miembros'])
                                </div>
                                <div class="col-md-4 input-group{{ $errors->has('costo') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-coins"></i>
                                        </div>
                                    </div>
                                    <input min="0" type="number" required name="costo" class="form-control{{ $errors->has('costo') ? ' is-invalid' : '' }}" placeholder="{{ __('Costo estimado *') }}" step="0.01">
                                    @include('alerts.feedback', ['field' => 'costo'])
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="row">                        
                        <div class="col-md-12" align="right">
                            <button class="btn  btn-primary" type="submit">Siguiente</button>
                        </div>
                    </div>     
                    <br>                     
                </div>
                 	
            </form>
        </div>
    </div>
    <!--div class="container menuF-container">
        <input type="checkbox" id="toggleF">
        <label for="toggleF" class="buttonF"></label>
        <nav class="navF">
            <a href="{{ route('solicitud.create')}}">Recursos</a>
            <a href="{{ route('solicitud.create')}}">Factibilidad</a>
           
            <a href="{{ route('solicitud.create')}}">Planificación</a>
            <a href="{{ route('cides') }}">Acerca de</a>
                <a href="#">Acciones largaaaaaaaaas</a>
        </nav>
    </div-->
</div>

@endsection
        