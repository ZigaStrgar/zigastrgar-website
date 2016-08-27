<section class="col-xs-12 portfolio">
    <h2 class="title">{{ $portfolio->title }}</h2>
    <div class="col-xs-12 features">
        @each('portfolios.partials.feature', explode(",", $portfolio->features), 'feature')
    </div>
    <div class="col-xs-12 col-sm-6 image">
        <img src="{{ url("images/".$portfolio->imagePath) }}" alt="{{ $portfolio->title }}" class="img-responsive">
    </div>
    <div class="col-xs-12 col-sm-6 content">
        <p>{{ $portfolio->content }}</p>
        @if(strlen($portfolio->link) > 0)
            <a href="{{ $portfolio->link }}" target="_blank" rel="noopener noreferrer" class="btn btn--bg-transparent btn--border-blue">Visit live version</a>
        @endif
        @if(strlen($portfolio->git) > 0 && Auth::check() && Auth::user()->isAdmin())
            <a href="{{ $portfolio->git }}" target="_blank" rel="noopener noreferrer" class="btn btn--bg-transparent btn--border-blue">Visit git repository</a>
        @endif
    </div>
</section>