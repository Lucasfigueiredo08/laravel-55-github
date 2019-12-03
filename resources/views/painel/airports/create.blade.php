@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('painel')}}" class="bred">Home ></a>
    <a href=" {{route('airports.index', $city->id)}} " class="bred">cidade {{$city->name}} ></a>
    <a href="" class="bred">Cadastrar Aeroport</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Cadastrar Aeroport para a cidade  {{$city->name}} </h1>
</div>

<div class="content-din">

   @include('painel.includes.errors')


{!! Form::open(['route'=> ['airports.store', $city->id], 'class' => 'form form-search form-ds', 'files' => true]) !!}
    @include('painel.airports.form')
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection