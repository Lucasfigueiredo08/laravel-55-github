@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('painel')}}" class="bred">Home   ></a>
    <a href="{{route('airports.index', $city->id)}}" class="bred">Airports</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Aeroportos da cidade: {{$city->name}} </h1>
</div>

	<div class="content-din bg-white">

			<div class="form-search">
			{!!Form::open(['route' => ['airports.search', $city->id], 'class' => "form form-inline"])!!}

					{!!Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja ?'])!!}

					<button class="btn btn-search">Pesquisar</button>
				{!! Form::close() !!}
			</div>

			@if(isset($dataForm['key_search']))
				<div class="alert alert-info">
					<p>
						<a href=""><i class="fa fa-refresh" aria-hidden="true"></i></a>
						Resultados para: <strong>{{$dataForm['key_search']}}</strong>
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
				<a href="{{ route('airports.create', $city->id) }}" class="btn-insert">
					<span class="glyphicon glyphicon-plus"></span>
					Cadastrar
				</a>
			</div>

			<table class="table table-striped">
				<tr>
					<th>Nome</th>
                    <th>Endereço</th>
					<th width="150">Ações</th>
				</tr>

				@forelse ($airports as $airport)
					<tr>
						<td> {{$airport->name}} </td>
            <td> {{$airport->address}} </td>
						<td>
							<a href="{{ route('airports.edit', [$city->id, $airport->id])}}" class="edit">Edit</a>
							<a href="{{route('airports.show', [$city->id, $airport->id]) }}" class="delete">View</a>
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
			{!! $airports->appends($dataForm)->links() !!}
		@else
			{!! $airports->links() !!}
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