@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href=" {{route('painel')}} " class="bred">Home   ></a>
    <a href="" class="bred">Flights</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Voos</h1>
</div>

	<div class="content-din bg-white">

			<div class="form-search">
			{!!Form::open(['route' => 'flights.search', 'class' => "form form-inline"])!!}

					{!!Form::number('code', null, ['class' => 'form-control', 'placeholder' => 'Código'])!!}
					{!!Form::date('date', null, ['class' => 'form-control'])!!}	
					{!!Form::time('hour_output', null, ['class' => 'form-control'])!!}	
					{!!Form::number('qtd_stops', null, ['class' => 'form-control', 'placeholder' => 'Total de Paradas'])!!}	
					
					{!! Form::select('airport_origin_id', $airports , null, ['class' => 'form-control']) !!}
					{!! Form::select('airport_destination_id', $airports , null, ['class' => 'form-control']) !!}

					<button class="btn btn-search">Pesquisar</button>
				{!! Form::close() !!}
			</div>


			@if(isset($dataForm))
				<div class="alert alert-info">
					<p>
						<a href=" {{route('flights.index')}} "><i class="fa fa-refresh" aria-hidden="true"></i></a>
						
						@if( isset($dataForm['code']))
						 <p> Código: <strong>{{$dataForm['code']}}</strong></p>
						@endif

						@if(isset($dataForm['date']))
						<p> Data: <strong>{{formatDateAndTime($dataForm['date'])}}</strong></p>
						@endif

						@if(isset($dataForm['hour_output']))
						<p> Hora de Saída: <strong>{{$dataForm['hour_output']}}</strong></p>
						@endif

						@if(isset($dataForm['qtd_stops']))
						<p> Total de paradas: <strong>{{$dataForm['qtd_stops']}}</strong></p>
						@endif
					</p>
				</div>
			@endif

			<!-- <div class="form-search">
				<form  class="form form-inline">
					<input type="text" name="nome" placeholder="Nome:" class="form-control">

					<button class="btn btn-search">Pesquisar</button>
				</form>
			</div> -->

			<div class="messages">
				@include('painel.includes.alerts')
			</div>


			<div class="class-btn-insert">
				<a href="{{ route('flights.create') }}"" class="btn-insert">
					<span class="glyphicon glyphicon-plus"></span>
					Cadastrar
				</a>
			</div>

			<table class="table table-striped">
				<tr>
					<th>#</th>
					<th>Imagem</th>
					<th>Origem</th>
					<th>Destino</th>
					<th>Paradas</th>
					<th>Data</th>
					<th>Saída</th>

					<th width="150">Ações</th>
				</tr>

				@forelse ($flights as $flight)
					<tr>
						<td> {{$flight->id}} </td>
						<td>
							@if($flight->image)
							 	<img src="{{url("storage/flights/{$flight->image}")}}" alt="{{$flight->id}}" style="max-width: 60px;" >
							@else
								<img src="{{url('assets/painel/imgs/no-image.png')}}" alt="{{$flight->id}}" style="max-width: 60px;" >
							@endif
						</td>
						<td>
							<a href="">{{$flight->origin->name}} </a>
						</td>
						<td>
							<a href="">{{$flight->destination->name}} </a>
						</td>
						<td> {{$flight->qtd_stops}} </td>
						<td> {{ formatDateAndTime($flight->date)}} </td>
						<td> {{ formatDateAndTime($flight->hour_output, 'H:i')}} </td>


						<td>
							<a href="{{ route('flights.edit', $flight->id)}}" class="edit">Edit</a>
							<a href="{{route('flights.show', $flight->id) }}" class="delete">View</a>
						</td>
					</tr>
				@empty
				<tr>
					<td colspan="200" rowspan="" headers="">Nenhum item cadastrado</td>
				</tr>

				@endforelse
			</table>


<!-- Paginação laravel -->
		@if(isset($dataForm))
			{!! $flights->appends($dataForm)->links() !!}
		@else
			{!! $flights->links() !!}
		@endif
<!-- Parte do Template layouy-viagem -->

			<!-- <nav aria-label="Page navigation">
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav> -->

		</div><!--Content Dinâmico-->

@endsection