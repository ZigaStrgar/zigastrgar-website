@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Courses'])
@endsection

@section('content')
    @each('articles.partials.article-list', $courses, 'post')
@endsection