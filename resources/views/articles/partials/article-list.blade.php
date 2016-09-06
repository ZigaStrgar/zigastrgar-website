<article data-article="{{ $post->id }}" class="article col-xs-12">
    <h2>{{ $post->title }}</h2>
    <div class="article-properties">
        <span class="article-property" data-toggle="tooltip"
              title="{{ $post->created_at->format("d. m. Y H:i") }}" data-placement="bottom">{{ $post->created_at->diffForHumans() }}</span>
        <span class="article-property">
            @foreach($post->tags as $tag)
                <a href="{{ url('tags/'.$tag->name) }}">{{ $tag->name }}</a>@unless($loop->last), @endunless
            @endforeach
        </span>
        <span class="article-property">by Žiga Strgar</span>
    </div>
    <hr>
    <div class="col-xs-12">
        <div class="article-content">
            {{ $post->excerpt }}
        </div>
        <div class="article-action">
            <a class="btn btn--border-blue btn--bg-transparent"
               href="{{ action('ArticlesController@show', ['id' => $post->slug]) }}">Read more ...</a>
            @if(Auth::check() && Auth::user()->isAdmin())
                <a class="btn btn--border-blue btn--bg-transparent"
                   href="{{ action('ArticlesController@edit', ['id' => $post->slug]) }}">Edit article</a>
                <a class="btn btn--border-danger btn--bg-danger"
                   onClick="deleteArticle({{ $post->id }});">Delete article</a>
            @endif
        </div>
    </div>
</article>

@section('scripts')
    @if(Auth::check() && Auth::user()->isAdmin())
        <script>
            function deleteArticle(id) {
                $.ajax({
                    url: 'blog/' + id,
                    type: 'DELETE',
                    data: {'_token': '{{ csrf_token() }}'},
                    success: function () {
                        $("article[data-article=" + id + "]").remove();
                    }
                })
            }

            $(function () {
                $("[data-toggle=tooltip]").tooltip();
            });
        </script>
    @endif
@endsection