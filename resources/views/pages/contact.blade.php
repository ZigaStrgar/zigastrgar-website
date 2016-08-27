@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Contact'])
@endsection

@section('content')
    <h2 class="text-center">You want to get in touch with me?
        <small>Feel free to use any contact method :)</small>
    </h2>
    <div class="col-xs-12 col-sm-4">
        <h3 class="page-header">My info</h3>
        <p>Žiga Strgar</p>
        <p>Ter 69, 3333 Ljubno ob Savinji</p>
        <p>+386 41-202/710</p>
        <p><a href="mailto:me@zigastrgar.com">me@zigastrgar.com</a></p>
    </div>
    <div class="col-xs-12 col-sm-8">
        <h3 class="page-header">Message me</h3>
        {!! Form::open(['url' => 'sendMessage', 'method' => 'POST']) !!}
        <div class='form-group'>
            {!! Form::label('name', 'Name & Surname') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Tell me who you are, so I can address you properly']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'How can I reach you back?']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('content', 'Content') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'What do you want to tell me ;)', 'rows' => '4']) !!}
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn--bg-transparent btn--border-blue" value="Message me">
        </div>
        {!! Form::close() !!}
    </div>
@endsection