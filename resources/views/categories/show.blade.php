@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Category: '.$category->name])
@endsection

@section('content')
    <section class="skill-set col-xs-12 center-block">
        @each('skills.partials.skill', $category->skills, 'skill')
    </section>
@endsection