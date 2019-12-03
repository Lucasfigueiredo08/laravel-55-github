@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="" class="bred">Home ></a>
    <a href="{{ route('airports.index', $city->id) }}" class="bred">Cidade {{$city->name}} ></a>
    <a href="" class="bred">Detalhes do Aeroporto</a>
</div>

<div class="title-pg">
    <h1 class="title-pg"> {{$airport->name}} - {{ $city->name }} </h1>
</div>

<div class="content-din">

    <ul>
        <li>Nome: <strong>{{$airport->name}}</strong> </li>
    </ul>

    <ul>
        <li>Latitude: <strong>{{$airport->latitude}}</strong> </li>
    </ul>

    <ul>
        <li>Longitude: <strong>{{$airport->longitude}}</strong> </li>
    </ul>

    <ul>
        <li>Endereço: <strong>{{$airport->address}}</strong> </li>
    </ul>

    <ul>
        <li>Número: <strong>{{$airport->number}}</strong> </li>
    </ul>

    <ul>
        <li>Código Postal: <strong>{{$airport->zip_code}}</strong> </li>
    </ul>

    <ul>
        <li>Complemento: <strong>{{$airport->complement}}</strong> </li>
    </ul>

<!-- Utilizando os formularios
    Do FORM COLLECTIVE
 -->

    {!! Form::open(['route'=> ['airports.destroy', $city->id , $airport->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        <div class="form-group">
            <button class="btn btn-danger">Deletar a aeroporto: {{ $airport->name }} </button>
        </div>
    <!-- </form> -->
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection