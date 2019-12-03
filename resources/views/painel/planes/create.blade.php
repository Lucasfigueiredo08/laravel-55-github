@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('painel')}}" class="bred">Home ></a>
    <a href="{{ route('planes.index') }}" class="bred">Aviões ></a>
    <a href="" class="bred">Cadastrar</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Cadastrar Avião </h1>
</div>

<div class="content-din">

   @include('painel.includes.errors')


{!! Form::open(['route'=>'planes.store', 'class' => 'form form-search form-ds']) !!}
    @include('painel.planes.form')
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection