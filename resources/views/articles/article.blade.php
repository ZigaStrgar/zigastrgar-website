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

@section('css')
    <link rel="stylesheet" href="{!! asset("/vendor/prism/prism.css") !!}"/>
@endsection

@section('scripts')
    <script src="{!! asset('/vendor/prism/prism.js') !!}"></script>
@endsection