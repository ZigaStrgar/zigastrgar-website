@extends('app')

@section('header')
    @include('headers.medium',['title' => 'Editing a portfolio item'])
@endsection

@section('content')
    {!! Form::model($portfolio, ['action' => ['PortfolioController', $portfolio->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    @include('portfolios.partials.form', ['color' => 'blue', 'submitText' => 'Edit portfolio'])
    {!! Form::close() !!}
@endsection