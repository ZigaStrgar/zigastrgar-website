<div class='form-group'>
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('subtitle', 'Subtitle') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('date', 'Date') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('content', 'Content') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('type', 'Type of biography event') !!}
    {!! Form::select('type', ['work' => 'Work', 'accomplishments' => 'Accomplishments', 'education' => 'Education'], null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('attachment_name', 'Attachment name') !!}
    {!! Form::text('attachment_name', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('attachment', 'Attachment') !!}
    <br/>
    <label class="btn btn-file btn--border-blue btn--bg-transparent">
        Browse {!! Form::file('attachment') !!}
    </label>
</div>
<div class="form-group">
    {!! Form::submit($submitText, ['class' => "btn btn--bg-$color btn--border-$color" ]) !!}
</div>

@section('scripts')
    @include('includes.tinymce')
@endsection