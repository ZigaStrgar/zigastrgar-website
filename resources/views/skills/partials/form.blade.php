<div class='form-group'>
    {!! Form::label('name', 'Skill name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('percentage', 'Skill percentage') !!}
    {!! Form::number('percentage', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', array_pluck(array_map(function($category){return ['id' => $category['id'], 'name' => $category['name']];}, $categories->toArray()), 'name', 'id') , null, ['class' => 'form-control']) !!}
</div>
<div class="from-group">
    {!! Form::submit($submitText, ['class' => "btn btn--bg-$color btn--border-$color"]) !!}
</div>