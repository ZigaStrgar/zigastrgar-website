<div class='form-group'>
    {!! Form::label('title', 'Blog title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Blog content') !!}
    <textarea id="content" name="content">{!! htmlentities($post->content) !!}</textarea>
</div>
<div class='form-group'>
    {!! Form::label('excerpt', 'Blog excerpt') !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'id' => 'excerpt']) !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list') !!}
    {!! Form::select('tag_list[]', $tags, null, ['multiple', 'class' => 'form-control tags-select']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitText, ['class' => "btn btn--border-$color btn--bg-$color"]) !!}
</div>

@section('scripts')
    <script src="/assets/js/select2.js"></script>
    <script>
        $(".tags-select").select2({
            tags: true
        })
    </script>
    @include('includes.tinymce')
@endsection