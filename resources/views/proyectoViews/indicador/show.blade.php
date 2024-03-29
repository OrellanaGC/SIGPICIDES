@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Indicador
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a href="{{route('indicador.general', $indicador->id)}}" @if($pageSlug == 'general') class="nav-item nav-link navbarCustom" @else class="nav-item nav-link" @endif>General</a>
					@if (!$indicador->modificable)
						@if($indicador->tipo)
							<a href="{{route('indicador.estadistica', $indicador->id)}}" @if($pageSlug == 'estadistica') class="nav-item nav-link navbarCustom" @else class="nav-item nav-link" @endif>Estadísticas</a>
						@endif
						<a href="{{route('indicador.task', $indicador->id)}}" @if($pageSlug == 'task') class="nav-item nav-link navbarCustom" @else class="nav-item nav-link" @endif>Tareas</a>
					@endif
				</div>
			</nav>
			<br>
			<div class="tab-content" id="nav-tabContent">

			  	@yield('seccion')

			</div>
		</div>	
		<div class="col-md-6">
			<a class="btn btn-primary btn-icon" href="{{ route('indicadores.index', [$proyecto->id]) }}">
				<i class="tim-icons icon-double-left"></i>
			</a>
		</div>

	</div>
@endsection