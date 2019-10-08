<!-- HEADER & LOGO SECTION -->
<header class="section-header">
    <section class="header-main">
        <div class="container-fluid">
            <div class="row bg-warning  py-4">
                <div class="col-md-10 ">
                    <h1 class="pl-3 text-center">
                    <a class="img-fluid nav-item" href="{{route('home')}}">
                            <img src="{{asset('images/frontend/anulogo.png')}}" width="7%" alt="logo"> 
                    </a>
                    ALL NATIONS UNIVERSITY COLLEGE 
                    </h1>
                </div>

            </div>

            <div class="row pt-2 mb-4 bg-dark text-white">
                <div class="col-md-9">
                    <h4 class="text-center"><i class="fa fa-graduation-cap"></i> 
                     @yield('name','Student Hall Ticketing System ')
                    </h4>
                </div>
                <div class="col-md-3">
                    @guest
                        <ul class="list-inline">
                            <li class="list-inline-item nav-item">
                                <a href="{{ route('login') }}" class="nav-link text-white">
                                    <i class="fa fa-user" style="color:#bdeb34" ></i> <span>Login</span>
                                </a>
                            </li> <span style="color:gold">|</span>
                            <li class="list-inline-item nav-item">
                                <a href="{{ route('register') }}" class="nav-link text-white">
                                    <i class="fa fa-user-plus" style="color:#bdeb34"></i> <span>Register</span>
                                </a>
                            </li>
                        </ul> 
                    @else
                        <ul>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->index_no }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault()
                                                        document.getElementById('logout-form')
                                                                .submit();"
                                        >
                                            {{__('Logout') }}
                                        </a>    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                            @csrf
                                        </form>
                                    <div>
                                </li>
                            </ul>
                        </ul>
                    @endguest
                </div>
            </div>

        </div>
    </section>
</header>