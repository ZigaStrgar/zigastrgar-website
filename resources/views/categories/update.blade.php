@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Updating category: '.$category->name])
@endsection

@section('content')
    {!! Form::model($category, ['action' => ['CategoriesController@update', $category->id], 'method' => 'PATCH']) !!}
    @include('categories.partials.form', ['submitText' => 'Edit category', 'color' => 'blue'])
    {!! Form::close() !!}
@endsection