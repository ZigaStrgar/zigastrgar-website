@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Skills'])
@endsection

@section('content')
    <section class="skill-set col-xs-12 center-block">
        <p class="text-muted">Please note that I'm not some kind of magician or artisan, this are all the things & languages I worked in and by any means I don't call my self an artisan in any of them, but I always find a way to make it work.</p>
        @each('skills.partials.category', $categories, 'category')
    </section>
@endsection

@section('scripts')
    @if(Auth::check() && Auth::user()->isAdmin())
        <script>
            function deleteSkill(id) {
                $.ajax({
                    url: 'skills/' + id,
                    type: 'DELETE',
                    data: {'_token': '{{ csrf_token() }}'},
                    success: function (cb) {
                        $("div[data-skill=" + id + "]").remove();
                    }
                })
            }
        </script>
    @endif
@endsection