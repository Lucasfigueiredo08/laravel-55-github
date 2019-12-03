@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('painel') }}" class="bred">Home   ></a>
    <a href="" class="bred">Estados</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Cidades</h1>
</div>

	<div class="content-din bg-white">

			<div class="form-search">
			{!!Form::open(['route' => 'states.search', 'class' => "form form-inline"])!!}

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
		</div>

			<div class="messages">
				@include('painel.includes.alerts')
			</div>

			<table class="table table-striped">
				<tr>
					<th>Nome</th>
					<th>Sigla</th>
					<th width="150">Ações</th>
				</tr>

				@forelse ($states as $state)
					<tr>
						<td> {{$state->name}} </td>
						<td> {{$state->initials}} </td>
						<td>
							<a href="{{route('state.cities', $state->initials)}}" class="edit">
								<i class="fa fa-map" aria-hidden="true" ></i> Cidades
							</a>
						</td>
					</tr>

				@empty
				<tr>
					<td colspan="200" rowspan="" headers="">Nenhum item cadastrado</td>
				</tr>

				@endforelse
			</table>


<!-- Paginação laravel -->

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