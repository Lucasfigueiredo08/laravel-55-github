@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href=" {{route('painel')}} " class="bred">Home   ></a>
    <a href="" class="bred">Usuarios</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Usuários</h1>
</div>

	<div class="content-din bg-white">

	<div class="form-search">
			{!!Form::open(['route' => 'users.search', 'class' => "form form-inline"])!!}

					{!!Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja ?'])!!}

					<button class="btn btn-search">Pesquisar</button>
				{!! Form::close() !!}
			</div>


			@if(isset($dataForm))
				<div class="alert alert-info">
					<p>
						<a href=" {{route('users.index')}} "><i class="fa fa-refresh" aria-hidden="true"></i></a>
						
						
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
				<a href="{{ route('users.create') }}"" class="btn-insert">
					<span class="glyphicon glyphicon-plus"></span>
					Cadastrar
				</a>
			</div>

			<table class="table table-striped">
				<tr>
					<th>Imagem</th>
					<th>Nome</th>
					<th>Email</th>


					<th width="150">Ações</th>
				</tr>

				@forelse ($users as $user)
					<tr>
						<td>
							@if($user->image)
							 	<img src="{{url("storage/users/{$user->image}")}}" alt="{{$user->id}}" style="max-width: 60px;" >
							@else
								<img src="{{url('assets/painel/imgs/no-image.png')}}" alt="{{$user->id}}" style="max-width: 60px;" >
							@endif
						</td>
						<td>
							<a href="">{{$user->name}} </a>
						</td>
						<td>
							<a href="">{{$user->email}} </a>
						</td>
						<td>
							<a href="{{ route('users.edit', $user->id)}}" class="edit">Edit</a>
							<a href="{{route('users.show', $user->id) }}" class="delete">View</a>
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
			{!! $users->appends($dataForm)->links() !!}
		@else
			{!! $users->links() !!}
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