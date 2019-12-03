@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('painel')}}" class="bred">Home ></a>
    <a href="{{ route('flights.index') }}" class="bred">Aviões ></a>
    <a href="" class="bred">Cadastrar</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Cadastrar Voo </h1>
</div>

<div class="content-din">

   @include('painel.includes.errors')


{!! Form::open(['route'=>'flights.store', 'class' => 'form form-search form-ds', 'files' => true]) !!}
    @include('painel.flights.form')
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection