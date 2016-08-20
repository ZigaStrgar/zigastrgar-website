@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Adding a skill'])
@endsection

@section('content')
    {!! Form::open(['url' => 'skills']) !!}
    @include('skills.partials.form', ['submitText' => 'Add skill', 'color' => 'success'])
    {!! Form::close() !!}
@endsection