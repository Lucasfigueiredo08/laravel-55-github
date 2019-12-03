@extends('painel.layouts.app')

@section('content')

<div class="bred">
    <a href="" class="bred">Home ></a>
    <a href="{{ route('brands.index') }}" class="bred">Marcas ></a>
    <a href="" class="bred">{{ $brand->id }}</a>
</div>

<div class="title-pg">
    <h1 class="title-pg"> {{$brand->name}} </h1>
</div>

<div class="content-din">

    <ul>
        <li>Nome: <strong>{{$brand->name}}</strong> </li>
    </ul>

<!-- Utilizando os formularios
    Do FORM COLLECTIVE
 -->

    {!! Form::open(['route'=> ['brands.destroy', $brand->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        <div class="form-group">
            <button class="btn btn-danger">Deletar a marca {{ $brand->name }} </button>
        </div>
    <!-- </form> -->
{!! Form::close() !!}
</div><!--Content Dinâmico-->

@endsection