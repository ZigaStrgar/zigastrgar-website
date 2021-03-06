<header class="header flex flex--align-vertical">
    <div class="container-custom flex flex--justify-right">
        <div class="header__links flex flex--justify-center">
            <nav class="flex flex--align-vertical">
                <ul class="flex">
                    <li class="text-center"><a href="{{ url('/') }}">Home</a></li>
                    <li class="text-center"><a href="{{ url('biography') }}">Bio</a></li>
                    <li class="text-center"><a href="{{ url('skills') }}">Skills</a></li>
                    <li class="text-center"><a href="{{ url('portfolio') }}">Portfolio</a></li>
                    <li class="text-center"><a href="{{ url('contact') }}">Contact</a></li>
                    @if(Auth::check())
                        <li class="text-center"><a onClick="logout()" href="#">Logout</a></li>
                    @else
                        <li class="text-center"><a href="{{ url('login') }}">Login</a></li>
                    @endif
                </ul>
            </nav>
        </div>
        <button type="button" class="header__btn">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>