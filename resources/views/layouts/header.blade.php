<!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.html"><span>Movie</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

       <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          {{-- <li><a href="#portfolio">Portfolio</a></li> --}}
            <li class="nav-item {{ Route::is('news') ? 'active' : '' }}">
              @can('isUser')
                    <a href="news">News</a>
                @endcan              
            </li>
            <li class="nav-item {{ Route::is('article') ? 'active' : '' }}">
                @can('isUser')
                    <a href="articles">Article</a>
                @endcan              
            </li>
            @guest
                <li >
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li >
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="drop-down">
                    <img src="{{asset('img/favicon.png')}}" alt="" srcset="">
                    {{-- <a href="#">{{ Auth::user()->name }} <span class="caret"></span></a> --}}
                <ul>
                    <li><a href="/profile/{{Auth::user()->id}}">Profile</a></li>
                    <li>                        
                         <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </a>                                                
                    </li>
                </ul>                    
                </li>
            @endguest
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
