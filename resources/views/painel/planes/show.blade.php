@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="" class="bred">Home ></a>
    <a href="{{ route('planes.index') }}" class="bred">Planes ></a>
    <a href="" class="bred">{{ $plane->id }}</a>
</div>

<div class="title-pg">
    <h1 class="title-pg"> {{$plane->name}} </h1>
</div>

<div class="content-din">

    <ul>
        <li>Código: <strong>{{$plane->id}}</strong> </li>
    </ul>
    <ul>
        <li>Marca: <strong>{{$brand}}</strong> </li>
    </ul>
    <ul>
        <li>Quantidade de Passageiros: <strong>{{$plane->qtd_passengers}}</strong> </li>
    </ul>

<!-- Utilizando os formularios
    Do FORM COLLECTIVE
 -->

    {!! Form::open(['route'=> ['planes.destroy', $plane->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        <div class="form-group">
            <button class="btn btn-danger">Deletar a avião {{ $plane->name }} </button>
        </div>
    <!-- </form> -->
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection