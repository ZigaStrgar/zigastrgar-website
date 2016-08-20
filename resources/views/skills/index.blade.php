@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Skills'])
@endsection

@section('content')
    <section class="skill-set col-xs-12 center-block">
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