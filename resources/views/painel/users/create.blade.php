@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('painel')}}" class="bred">Home ></a>
    <a href="{{ route('users.index') }}" class="bred">Usuários ></a>
    <a href="" class="bred">Cadastrar</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Cadastrar Usuário </h1>
</div>

<div class="content-din">

   @include('painel.includes.errors')


{!! Form::open(['route'=>'users.store', 'class' => 'form form-search form-ds']) !!}
    @include('painel.users.form')
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection