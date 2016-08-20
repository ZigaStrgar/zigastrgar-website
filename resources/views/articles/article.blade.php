@extends('app')

@section('header')
    @include('headers.article')
@endsection

@section('content')
    <div class="row">
        <article class="article col-xs-12">
            <div class="article-description">
                {!! $post->content !!}
            </div>
        </article>
    </div>
@endsection