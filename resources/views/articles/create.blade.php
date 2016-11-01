@extends('app')

@section('css')
    <link rel="stylesheet" href="/assets/css/select2.min.css" type="text/css"/>
@endsection

@section('header')
    @include('headers.medium', ['title' => 'Add blog post'])
@endsection

@section('content')
    {!! Form::model($post = new \App\Post(), ['url' => 'blog']) !!}
    @include('articles.partials.form', ['submitText' => 'Add post', 'color' => 'success'])
    {!! Form::close() !!}
@endsection