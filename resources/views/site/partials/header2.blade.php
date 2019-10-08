<!-- HEADER & LOGO SECTION -->
<header id="main-header" class="py-4">
    <section class="header-main">
        <div class="container">
            <div class="row bg-warning align-items-center">
                <div class="col">
                    <h1 class="text-center">
                    <img src="{{asset('images/frontend/anu-logo.png')}}" width="7%" alt="logo"> ALL NATIONS UNIVERSITY COLLEGE </h1>
                </div>
            </div>
        

            <!-- TITLE SECTION -->
            <div id="post" class="py-2 mb-4 bg-dark text-white">
                
                <div class="row">
                    <div class="col-8">
                        <h3 class="text-center"><i class="fa fa-graduation-cap"></i> Student Hall Ticketing System </h3>
                    </div>
                    <div class="col-4">
                        @guest
                            <div class="widget-header">
                                <a href="{{ route('login') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-primary round text-white"><i class="fa fa-user"></i></div>
                                    <div class="text-wrap"><span>Login</span></div>
                                </a>
                            </div>
                            <div class="widget-header">
                                <a href="{{ route('register') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-success round text-white"><i class="fa fa-user"></i></div>
                                    <div class="text-wrap"><span>Register</span></div>
                                </a>
                            </div>
                        @else
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
                        @endguest
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</header>