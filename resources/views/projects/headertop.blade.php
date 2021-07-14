<header class="header rs-nav">
    <div class="top-bar">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="topbar-left">
                    <ul>
                        <li><a href="#"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
                        <li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>
                    </ul>
                </div>
                <div class="topbar-right">
                    <ul>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/home') }}">Home</a><li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
        
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-header navbar-expand-lg">
        <div class="menu-bar clearfix">
            <div class="container clearfix">
                <div class="menu-logo">
                    <a href="{{ route('welcome') }}"><img src="{!! asset('assets/images/mekcas-logo.png')!!}" alt=""></a>
                </div>
                <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                
                <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                    <div class="menu-logo">
                        <a href="{{ route('welcome') }}"><img src="{!! asset('assets/images/mekcas-logo.png')!!}" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav">	
                        <li class="active">
                            <a href="{{ route('welcome') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>