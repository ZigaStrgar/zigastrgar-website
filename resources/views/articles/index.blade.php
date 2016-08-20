@extends('app')

@section('header')
    @include('headers.small', ['title' => 'Blog'])
@endsection

@section('content')
    <div class="row">
        @each('articles.partials.article-list', $posts, 'post')
    </div>
@endsection