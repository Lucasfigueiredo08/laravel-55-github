@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('painel') }}" class="bred">Home   ></a>
    <a href="{{ route('states.index') }}" class="bred">Estados   ></a>
    <a href="{{ route('state.cities', $state->initials) }}" class="bred">{{$state->name}}   ></a>
    <a href="" class="bred">Cidades</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Cidades do Estado ({{$cities->count()}} - {{$cities->total()}})  : <strong> {{$state->name}} </strong></h1>
</div>

	<div class="content-din bg-white">

			<div class="form-search">
			{!!Form::open(['route' => ['state.cities.search', $state->initials], 'class' => "form form-inline"])!!}

					{!!Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja ?'])!!}

					<button class="btn btn-search">Pesquisar</button>
				{!! Form::close() !!}
			</div>

			@if(isset($dataForm['key_search']))
				<div class="alert alert-info">
					<p>
						<a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
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
					<th width="150">Ações</th>
				</tr>

				@forelse ($cities as $city)
					<tr>
						<td> {{$city->name}} </td>
						<td>
							<a href="{{ route('airports.index', $city->id)}} " class="edit">
								<i class="fa fa-thumb-tack" aria-hidden="true"></i>
							Aeroportos
							</a>
						</td>
					</tr>

				@empty
				<tr>
					<td colspan="200" rowspan="" headers="">Nenhum item cadastrado</td>
				</tr>

				@endforelse
			</table>

			@if(isset($dataForm))
				{!! $cities->appends($dataForm)->links() !!}
			@else
				{!! $cities->links()	!!}
			@endif
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