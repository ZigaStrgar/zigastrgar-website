@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Login'])
@endsection

@section('content')
    <div class="col-sm-12 col-md-push-3 col-md-6 center-block">
        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <input checked type="checkbox" name="remember"> Remember Me
            </div>

            <div>
                <button class="btn btn--bg-transparent btn--border-blue" type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection