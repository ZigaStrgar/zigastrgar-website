<div class="cd-timeline-block" @if(Auth::check() && Auth::user()->isAdmin())data-bio="{{ $biography->id }}"@endif>
    <div class="cd-timeline-img cd-{{ $biography->type }}">
        <?php
        switch ( $biography->type ) {
            case "work":
                $icon = "building-o";
                break;
            case "accomplishments":
                $icon = "trophy";
                break;
            case "education":
                $icon = "graduation-cap";
                break;
        }
        ?>
        <span class="icon icon-{{ $icon }}"></span>
    </div>
    <div class="cd-timeline-content">
        <h2>{{ $biography->title }} @if(!is_null($biography->subtitle))
                <small>{{ $biography->subtitle }}</small>@endif</h2>
        <p>{{ $biography->content }}</p>
        <span class="cd-date">{{ $biography->date }}</span>
        @if(Auth::check() && Auth::user()->isAdmin())
            <div class="pull-right">
                <a class="cd-read-more" href="{{ action('BiographyController@edit', $biography->id) }}">Edit</a>
                <a class="cd-read-more cd-read-more-danger pointer" onClick="deleteBio({{ $biography->id }});">Delete</a>
            </div>
        @endif
    </div>
</div>

@section('scripts')
    <script>
        function deleteBio(id) {
            $.ajax({
                url: 'biography/' + id,
                type: 'DELETE',
                data: {'_token': '{{ csrf_token() }}'},
                success: function () {
                    $("div[data-bio=" + id + "]").remove();
                }
            });
        }
    </script>
@endsection