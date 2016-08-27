@extends('app')

@section('header')
    @include('headers.medium',['title' => 'Adding a portfolio'])
@endsection

@section('content')
    {!! Form::open(['url' => 'portfolio', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @include('portfolios.partials.form', ['color' => 'success', 'submitText' => 'Add portfolio'])
    {!! Form::close() !!}
@endsection