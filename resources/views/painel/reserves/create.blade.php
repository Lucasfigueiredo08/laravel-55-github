@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('painel')}}" class="bred">Home ></a>
    <a href="{{ route('reserves.index') }}" class="bred">Reservas ></a>
    <a href="" class="bred">Cadastrar</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Nova Reserva </h1>
</div>

<div class="content-din">

   @include('painel.includes.errors')


{!! Form::open(['route'=>'reserves.store', 'class' => 'form form-search form-ds']) !!}
    @include('painel.reserves.form')
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection