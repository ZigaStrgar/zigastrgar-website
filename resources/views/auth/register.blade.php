@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Registration'])
@endsection

@section('content')
    <div class="col-sm-12 col-md-6 col-md-push-3">
        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}

            <div class="form-group">
                Name & Surname
                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                Email
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                Password
                <input class="form-control" type="password" name="password">
            </div>

            <div class="form-group">
                Confirm Password
                <input class="form-control" type="password" name="password_confirmation">
            </div>

            <div class="form-group">
                <button class="btn btn--border-blue btn--bg-transparent" type="submit">Register</button>
            </div>
        </form>
    </div>
@endsection