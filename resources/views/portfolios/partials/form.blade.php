<div class='form-group'>
    {!! Form::label('title', 'Project title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('content', 'Project content') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('features', 'Project features') !!}
    {!! Form::text('features', null, ['class' => 'form-control']) !!}
    <p class="help-block">Split them with ","</p>
</div>
<div class='form-group'>
    {!! Form::label('link', 'Project link') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('git', 'Project git') !!}
    {!! Form::text('git', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    <strong>Is this a mobile project</strong> {!! Form::checkbox('mobile', 1, null) !!}
</div>
<div class='form-group'>
    {!! Form::label('image', 'Project image') !!}
    <br />
    <label class="btn btn-file btn--border-blue btn--bg-transparent">
        Browse {!! Form::file('image') !!}
    </label>
</div>
<div class="form-group">
    {!! Form::submit($submitText, ['class' => "btn btn--bg-$color btn--border-$color" ]) !!}
</div>

@section('scripts')
    @include('includes.tinymce')
@endsection