<div class="form-group">
    {!! Form::label('name', 'Category name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitText, ['class' => "btn btn--bg-$color btn--border-$color" ]) !!}
</div>