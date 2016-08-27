@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Updating biography: '.$biography->title])
@endsection

@section('content')
    {!! Form::model($biography, ['action' => ['BiographyController@update', $biography->id], 'method' => 'PATCH']) !!}
    @include('biography.partials.form', ['submitText' => 'Edit biography', 'color' => 'blue'])
    {!! Form::close() !!}
@endsection