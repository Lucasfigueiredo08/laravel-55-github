@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="" class="bred">Home ></a>
    <a href="{{ route('users.index') }}" class="bred">Usuários ></a>
    <a href="" class="bred">{{ $user->name }}</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Detalhes do Usuário: {{$user->name}} </h1>
</div>

<div class="content-din">

    <ul>
        <li>
        @if($user->image)
							 	<img src="{{url("storage/users/{$flight->image}")}}" alt="{{$user->id}}" style="max-width: 60px;" >
							@else
								<img src="{{url('assets/painel/imgs/no-image.png')}}" alt="{{$user->id}}" style="max-width: 60px;" >
							@endif
        </li>
        <li>
            Nome: <strong>{{$user->name}}</strong> 
        </li>
    </ul>
    <ul>
        <li>Email: <strong>{{$user->email}}</strong> </li>
    </ul>

    <ul>
        <li>É Adminstrador?: <strong>{{$user->is_admin ? 'Sim' : 'Não'}}</strong> </li>
    </ul>

<!-- Utilizando os formularios
    Do FORM COLLECTIVE
 -->

    {!! Form::open(['route'=> ['users.destroy', $user->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        <div class="form-group">
            <button class="btn btn-danger">Deletar Usuário {{ $user->name }} </button>
        </div>
    <!-- </form> -->
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection