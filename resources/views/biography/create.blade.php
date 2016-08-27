@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Adding a biography event'])
@endsection

@section('content')
    {!! Form::open(['url' => 'biography']) !!}
    @include('biography.partials.form', ['submitText' => 'Add biography', 'color' => 'success'])
    {!! Form::close() !!}
@endsection