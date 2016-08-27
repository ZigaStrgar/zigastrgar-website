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
    </div>
</section>