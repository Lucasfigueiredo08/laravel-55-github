@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('painel')}}" class="bred">Home ></a>
    <a href="{{ route('planes.index') }}" class="bred">Aviões ></a>
    <a href="" class="bred">Editar</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Editar avião: <strong>{{$plane->name}}</strong> </h1>
</div>

<div class="content-din">

   @include('painel.includes.errors')


{!! Form::model( $plane ,['route'=> ['planes.update', $plane->id], 'class' => 'form form-search form-ds', 'method' => 'PUT']) !!}
    @include('painel.planes.form')
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection