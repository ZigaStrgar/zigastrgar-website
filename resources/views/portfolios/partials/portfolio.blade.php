<section class="col-xs-12 portfolio" data-portfolio="{{ $portfolio->id }}">
    <h2 class="title">{{ $portfolio->title }}</h2>
    <div class="col-xs-12 features">
        @each('portfolios.partials.feature', explode(",", $portfolio->features), 'feature')
    </div>
    @if(is_null($portfolio->image))
        <div class="col-xs-12 col-sm-6 image mac">
            @if($portfolio->mobile)
                <?php $type = "mobile" ?>
                @if($portfolio->landscape)
                    <?php $type = "landscape" ?>
                @endif
            @else
                <?php $type = "mac" ?>
            @endif
            <img src="/assets/img/{{ $type }}.png">
            <div class="{{ $type }}__content">
                <img src="{{ asset("storage/".$portfolio->image->path) }}" alt="{{ $portfolio->title }}"
                     class="img-responsive">
            </div>
        </div>
    @endif
    <div class="col-xs-12 @if(strlen($portfolio->image->path) > 0) col-sm-6 @endif content">
        {!! $portfolio->content !!}
        @if(strlen($portfolio->link) > 0)
            <a href="{{ $portfolio->link }}" target="_blank" rel="noopener noreferrer"
               class="btn btn--bg-transparent btn--border-blue">Visit live version</a>
        @endif
        @if(strlen($portfolio->git) > 0 && Auth::check() && Auth::user()->isAdmin())
            <a href="{{ $portfolio->git }}" target="_blank" rel="noopener noreferrer"
               class="btn btn--bg-transparent btn--border-blue"><span class="icon icon-code-fork"></span> Visit git
                repository</a>
        @endif
        @if(Auth::check() && Auth::user()->isAdmin())
            <a href="{{ action('PortfoliosController@edit', $portfolio->id) }}"
               class="btn btn--border-blue btn--bg-transparent">Edit
                portfolio</a>
            <a onClick="deletePortfolio({{ $portfolio->id }})" class="btn btn--bg-danger btn--border-danger pointer">Delete
                portfolio</a>
        @endif
    </div>
</section>

@section('scripts')
    <script>
        function deletePortfolio(id) {
            $.ajax({
                url: 'portfolio/' + id,
                type: 'DELETE',
                data: {'_token': '{{ csrf_token() }}'},
                success: function () {
                    $("section[data-portfolio=" + id + "]").remove();
                }
            })
        }
    </script>
@endsection