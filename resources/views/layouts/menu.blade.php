  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Blog Laravel</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                    @if(!Auth::guest())
                    <li>
                        <a href="{{ route('posts') }}">Posts</a>
                    </li>
                    @endif
                    @if(Auth::guest())
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="dropdown">
                            <a href="" class="dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                 aria-expanded"false"
                                 aria-haspopup="true">
                                 {{ Auth::user()->name }} <span class="caret"></span>                  
                             </a>
                    <ul class="dropdown-menu">
                         <li>
                           <a href="{{ route('logout') }}" onclick="
                           event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a>
                          <form action="{{ route('logout') }}" id="logout-form" method="post">
                            {!! csrf_field() !!}
                         </form>
                        </li>
                    
                   </ul>
                    
                 </li>
                   
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>