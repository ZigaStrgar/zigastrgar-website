<a href="{{ url('tags/'.$tag->name) }}">{{ $tag->name }}</a>
@if($loop->last)
,
@endif