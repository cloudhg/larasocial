
<nav class="navbar navbar-expand-lg navbar-light navbar-default">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            HOME
        </a>	
		<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
		  <!-- <li class="nav-item active">
		    <a href="{{ route('aboutme') }}" class="nav-link"> ABOUT ME </a>
          </li> -->
		  <li class="nav-item active">
		    <a href="{{ route('todolist') }}" class="nav-link"> TODO LIST </a>
          </li>
		  <li class="nav-item active">
		    <a href="{{ route('mymap') }}" class="nav-link"> MYMAP </a>
          </li>
		  <li class="nav-item active">
		    <a href="{{ route('movie') }}" class="nav-link"> MOVIE </a>
          </li>
        </ul>
		<form action="{{ route('search') }}" method="GET" class="form-inline" role="search">
	        <input type="search" class="form-control form-control-md mr-md-2" name="keyword" placeholder="Search Task Title" aria-label="Search">
	        <button type="submit" class="btn btn-md btn-outline-info my-2 my-md-0">
	            <i class="fas fa-search"></i>
	            Search
	        </button>
        </form>
		{{-- // ----- Login panel ----- //--}}
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{ Auth::user()->name }}, Hello!
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); $('#logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
					<li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
	</div>
</nav>

