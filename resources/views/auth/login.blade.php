@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Login'])
@endsection

@section('content')
    <div class="col-sm-12 col-md-push-3 col-md-6 center-block">
        {!! Form::open(['url' => 'login', 'method' => 'POST']) !!}
        <div class='form-group'>
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            <input checked type="checkbox" name="remember"> Remember Me
        </div>
        <div class="form-group">
            <button class="btn btn--border-blue btn--bg-transparent" type="submit">Register</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection