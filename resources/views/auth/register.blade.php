@extends('layouts.app', ['class' => 'login-page', 'page' => __('Registro')])

@section('title')
    Registro
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 ml-auto">
            <div class="info-area info-horizontal mt-5">
                <div class="icon icon-warning">
                    <img src="{{ asset('black') }}/img/favicon.png" alt=""><hr>
                </div>
                <div class="description">
                    <!--h3 class="info-title" align='center'>{{ __('UNETE') }}</h3-->
                    <p class="description" align='justify'>
                        {{ __('Registra tu primera solicitud de investigación. Únete al equipo de CIDES.') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mr-auto ml-auto">
            <div class="card card-login card-white">
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body">
                        <p style="color:red">Datos requeridos: *</p><br>
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre completo *') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo electrónico *') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-lock-circle"></i>
                                        </div>
                                    </div>
                                    <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña *') }}">
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-lock-circle"></i>
                                        </div>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirmar contraseña *') }}">
                                </div>
                            </div>
                        </div>
                        <div class="input-group{{ $errors->has('institucion') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-bank"></i>
                                </div>
                            </div>
                            <input type="text" name="institucion" class="form-control{{ $errors->has('institucion') ? ' is-invalid' : '' }}" placeholder="{{ __('Institución de procedencia *') }}">
                            @include('alerts.feedback', ['field' => 'institucion'])
                        </div>
                        <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-align-left-2"></i>
                                </div>
                            </div>
                            <input type="text" name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripción personal *') }}">
                            @include('alerts.feedback', ['field' => 'descripcion'])
                        </div>
                        <div class="input-group{{ $errors->has('fecha_nac') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-birthday-cake" aria-hidden="true"> *</i>
                                </div>
                            </div>
                            <input type="date" max="2002-01-01" name="fecha_nac" class="form-control {{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" placeholder="{{ __('Fecha de nacimiento') }}">
                            @include('alerts.feedback', ['field' => 'fecha_nac'])
                        </div>
                        <div class="input-group {{ $errors->has('sexo') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control selectorWapis" id="sexo" name="sexo">
                                <option value="" selected disabled hidden>Sexo *</option>
                                <option>Femenino</option>
                                <option>Masculino</option>
                            </select>    
                            @include('alerts.feedback', ['field' => 'sexo'])                        
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Únete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
