@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Contact'])
@endsection

@section('content')
    <h2 class="text-center">You want to get in touch with me? <small>Feel free to use any contact method :)</small></h2>
    <div class="col-xs-12 col-sm-4">
        <h3 class="page-header">My info</h3>
        <p>Žiga Strgar</p>
        <p>Ter 69, 3333 Ljubno ob Savinji</p>
        <p>+386 41-202/710</p>
        <p><a href="mailto:me@zigastrgar.com">me@zigastrgar.com</a></p>
    </div>
    <div class="col-xs-12 col-sm-8">
        <h3 class="page-header">Message me</h3>
        <form method="POST" action="sendMessage">
            <div class="form-group">
                <label for="name">Name & Surname</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Tell me who you are, so I can address you properly">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="How can I reach you back?">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea cols="4" class="form-control" id="content" placeholder="What do you want to tell me ;)"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn--bg-transparent btn--border-blue" value="Message me">
            </div>
        </form>
    </div>
@endsection