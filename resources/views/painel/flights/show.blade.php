@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="" class="bred">Home ></a>
    <a href="{{ route('flights.index') }}" class="bred">Voos ></a>
    <a href="" class="bred">{{ $flight->id }}</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Detalhes do voo: {{$flight->name}} </h1>
</div>

<div class="content-din">

    <ul>
        <li>Código: <strong>{{$flight->id}}</strong> </li>
    </ul>
    <ul>
        <li>Origem: <strong>{{$flight->origin->name}}</strong> </li>
    </ul>
    <ul>
        <li>Destino: <strong>{{$flight->destination->name}}</strong> </li>
    </ul>

    <ul>
        <li>Data: <strong>{{  formatDateAndTime($flight->date)}}</strong> </li>
    </ul>

    <ul>
        <li>Duração: <strong>{{ formatDateAndTime($flight->time_duration, 'H:i')}}</strong> </li>
    </ul>

    <ul>
        <li>Saída: <strong>{{ formatDateAndTime($flight->hour_output, 'H:i') }}</strong> </li>
    </ul>

    <ul>
        <li>Chegada: <strong>{{ formatDateAndTime($flight->arrival_time, 'H:i')}}</strong> </li>
    </ul>

    <ul>
        <li>Preço antigo: <strong>{{ number_format($flight->old_price, 2, ',','.')}}</strong> </li>
    </ul>

    <ul>
        <li>Preço: <strong>{{  number_format($flight->price, 2, ',','.')}}</strong> </li>
    </ul>

    <ul>
        <li>Total de parcelas: <strong>{{$flight->total_plots}}</strong> </li>
    </ul>

    <ul>
        <li>É Promoção?: <strong>{{$flight->is_promotion ? 'Sim' : 'Não'}}</strong> </li>
    </ul>

    <ul>
        <li>Paradas: <strong>{{$flight->qtd_stops}}</strong> </li>
    </ul>

    <ul>
        <li>Descrição: <strong>{{$flight->description}}</strong> </li>
    </ul>

    

<!-- Utilizando os formularios
    Do FORM COLLECTIVE
 -->

    {!! Form::open(['route'=> ['flights.destroy', $flight->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        <div class="form-group">
            <button class="btn btn-danger">Deletar a voo {{ $flight->id }} </button>
        </div>
    <!-- </form> -->
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection