<article data-article="{{ $post->id }}" class="article col-xs-12">
    <h2>{{ $post->title }}</h2>
    <hr>
    <div class="article-property col-xs-12 col-sm-4 col-md-2">
        <div class="article-date">{{ $post->created_at->diffForHumans() }}</div>
        <div class="article-tags">
            @each('articles.partials.tag', $post->tags, 'tag')
        </div>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-10">
        <div class="article-content">
            {{ $post->content }}
        </div>
        <a class="pull-right btn btn--border-danger btn--bg-danger"
           onClick="deleteArticle({{ $post->id }});">Delete article</a>
        <a class="pull-right btn btn--border-blue btn--bg-transparent"
           href="{{ action('ArticlesController@edit', ['id' => $post->id]) }}">Edit article</a>
        <a class="pull-right btn btn--border-blue btn--bg-transparent"
           href="{{ action('ArticlesController@show', ['id' => $post->id]) }}">Read more ...</a>
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
        </script>
    @endif
@endsection