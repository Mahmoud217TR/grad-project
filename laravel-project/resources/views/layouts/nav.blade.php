
  {{--start navbar--}}
  <nav class="navbar navbar-expand-lg navbar-dark nav-image px-4 sticky-top">
    <div class="container-fluid">
      <div class="navbar-brand d-flex justify-content-center align-items-center">
        {{--start Logo--}}                  
          <a href="{{ route('welcome') }}" class="unstyled-anchor me-2">
            @include('components.logo',['width'=>60,'height'=>60])
          </a>
        {{--end logo--}}
        {{--Strat Name Project--}} 
          <a href="/" class="unstyled-anchor head-line text-in-header">{{ config('app.name', 'Laravel') }}</a>
        {{--end Name--}}
      </div>
  
      <button class="navbar-toggler mx-auto mx-sm-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarNavDropdown">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item text-center px-2">
           <a href="{{ route('home') }}" class="TH unstyled-anchor">Home</a>
          </li>
          <li class="nav-item text-center px-2">
            <a href="{{ route('editor') }}" class="TH unstyled-anchor">Editor</a>
          </li>
          <li class="nav-item text-center px-2">
            <a href="{{ route('search') }}" class="TH unstyled-anchor">Search</a>
          </li>
          @guest
            <li class="nav-item text-center px-2">
              <a href="{{ route('login') }}" class="TH unstyled-anchor">Login</a>
            </li>
            <li class="nav-item text-center px-2">
              <a href="{{ route('register') }}" class="TH unstyled-anchor">Register</a>
            </li>
          @else
            <li class="nav-item dropdown text-center px-2">
              <a class="nav-link dropdown-toggle TH unstyled-anchor text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profile
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                <li><a class="dropdown-item" href="{{ route('profile.show',auth()->user()) }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('profile.edit',auth()->user()) }}">Edit Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                @if (auth()->user()->isWebAdmin())
                  <li><a class="dropdown-item" href="{{ route('panel')}}">Admin Panel</a></li>
                  @if (auth()->user()->isSysAdmin())
                    <li><a class="dropdown-item" href="{{ route('telescope') }}">Telescope</a></li>
                  @endif
                  <li><hr class="dropdown-divider"></li>
                @endif
                <li>
                  <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                  <form form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                  </form>
                </li>
              </ul>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  {{--end navbar--}}

