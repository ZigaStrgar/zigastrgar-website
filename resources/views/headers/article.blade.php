<section class="background--image flex flex--align-vertical flex--justify-center background--article" id="background">
    <div class="flex flex--justify-center flex--column">
        <h1 class="text--white text-center">{{ $post->title }}</h1>
        @if(count($post->tags->toArray()) > 0)
            <div class="tags center-block">
                @foreach($post->tags as $tag)
                    <a class="btn btn--border-blue btn--bg-transparent text--white"
                       href="{{ url('tags/'.$tag->name) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        @endif
    </div>
</section>