@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Registration'])
@endsection

@section('content')
    <div class="col-sm-12 col-md-6 col-md-push-3">
        {!! Form::open(['url' => 'register', 'method' => 'POST']) !!}
        <div class='form-group'>
            {!! Form::label('name', 'Name & Surname') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('password_confirmation', 'Password confirmation') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <button class="btn btn--border-blue btn--bg-transparent" type="submit">Register</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection