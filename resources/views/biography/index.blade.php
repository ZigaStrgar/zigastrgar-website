@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Biography'])
@endsection

@section('content')
    <section id="cd-timeline">
        @each('biography.partials.biography', $biographies, 'biography')
    </section>
@endsection