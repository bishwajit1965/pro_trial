<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Laravel
            </a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/')       ? "active" : "" }}"><a href="{{ url('/') }}"> Home</a></li>
                <li class="{{ Request::is('blog')    ? "active" : "" }}"><a href="{{ url('blog') }}"> Blog</a></li>
                <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{ url('contact') }}"> Contact Me</a></li>
                <li class="{{ Request::is('about')   ? "active" : "" }}"><a href="{{ url('about') }}"> About Me</a></li>
                <li class="{{ Request::is('notice')  ? "active" : "" }}"><a href=" {{ action('NoticeController@index') }} "> All Notice</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="" name="search" id="search">
                </div>
                <button type="submit" class="btn btn-default"><span class=" glyphicon glyphicon-search"></span> Refresh</button>
            </form>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Hello {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href=" {{ action('PostController@index') }} "><span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span> All Posts </a></li>
                        <li><a href=" {{ action('CategoryController@index') }}"><span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span> Category </a></li>
                        <li><a href=" {{ action('TagController@index') }}"><span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span> View Tag </a></li>
                        <li><a href=" {{ action('NoticeController@index') }} "><span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span> All Notice </a></li>
                        <li><a href=" {{ action('StudentsController@index') }} "><span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span> All Students </a></li> &nbsp;
                        <li><a href=" {{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout </a> </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
