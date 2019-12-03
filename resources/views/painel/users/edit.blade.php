@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('painel')}}" class="bred">Home ></a>
    <a href="{{ route('users.index') }}" class="bred">Usuários ></a>
    <a href="" class="bred">Editar</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Editar Usuário {{$user->name}} </h1>
</div>

<div class="content-din">

   @include('painel.includes.errors')


{!! Form::model( $user, ['route' => ['users.update', $user->id], 'class' => 'form form-search form-ds', 'method' => 'PUT']) !!}
    @include('painel.users.form')
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection