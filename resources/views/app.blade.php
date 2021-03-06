<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type: text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Žiga Strgar - Web Developer</title>
    <link rel="stylesheet" href="/css/main.css">
    @yield('css')
</head>
<body>
@include('includes.menu')
@yield('header')
<div class="container shadows">
    @include('errors.list')
    @include('flash::message')
    @yield('content')
</div>
<footer class="footer flex flex--column text-center flex--center flex--justify-center">
    <p>Žiga Strgar © 2017&nbsp;&nbsp;•&nbsp;&nbsp;Design by: FRIThemes</p>
    <div class="footer-social">
        <a href="https://www.facebook.com/ziga.strgar" rel="noreferrer noopener" target="_blank"
           class="icon icon-social-facebook"></a>
        <a href="https://twitter.com/ZigaStrgar" rel="noreferrer noopener" class="icon icon-social-twitter"></a>
        <a href="https://github.com/ZigaStrgar" rel="noreferrer noopener" target="_blank"
           class="icon icon-social-github"></a>
        <a href="https://bitbucket.org/zigastrgar/" rel="noreferrer noopener" target="_blank"
           class="icon icon-bitbucket"></a>
        <a href="https://www.linkedin.com/in/zigastrgar" rel="noreferrer noopener"
           class="icon icon-social-linkedin"></a>
        <a href="https://www.snapchat.com/add/zigastrgar" rel="noreferrer noopener" target="_blank"
           class="icon icon-social-snapchat"></a>
        <a href="https://instagram.com/strgarziga" rel="noreferrer noopener" target="_blank"
           class="icon icon-social-instagram"></a>
        <a href="https://plus.google.com/116225034462413260807" rel="noreferrer noopener" target="_blank"
           class="icon icon-social-googleplus"></a>
        <a href="skype:titanus19921?call" class="icon icon-social-skype"></a>
    </div>
</footer>
@if(Auth::check())
    {!! Form::open(['url' => 'logout', 'method' => 'POST', 'id' => 'logMeOut']) !!}
    {!! Form::close() !!}
@endif
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
@yield('scripts')
</body>
</html>