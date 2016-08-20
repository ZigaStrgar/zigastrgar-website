@extends('app')

@section('css')
    <link rel="stylesheet" href="/assets/css/select2.min.css" type="text/css"/>
@endsection

@section('header')
    @include('headers.medium', ['title' => 'Add blog post'])
@endsection

@section('content')
    {!! Form::model($post, ['action' => ['ArticlesController@update', $post->id], 'method' => 'PATCH']) !!}
    @include('articles.partials.form', ['submitText' => 'Edit post', 'color' => 'blue'])
    {!! Form::close() !!}
@endsection