@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Creating category'])
@endsection

@section('content')
    {!! Form::open(['url' => 'categories']) !!}
    @include('categories.partials.form', ['submitText' => 'Add category', 'color' => 'success'])
    {!! Form::close() !!}
@endsection