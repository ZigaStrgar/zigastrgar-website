@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Portfolio'])
@endsection

@section('content')
    <section id="portfolio">
        @each('portfolios.partials.portfolio', $portfolios, 'portfolio')
    </section>
@endsection