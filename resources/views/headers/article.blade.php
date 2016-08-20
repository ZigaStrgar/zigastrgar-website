<section class="background--image flex flex--align-vertical flex--justify-center"
         style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/img/cover.jpg') no-repeat center center; height: 30vh;">
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