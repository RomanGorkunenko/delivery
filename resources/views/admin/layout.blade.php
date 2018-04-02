<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/css/admin.css">
    <style>
        table.table form {
            display: inline-block;
        }

        button.delete {
            background: transparent;
            border: none;
            color: #337ab7;
            padding: 0px;
        }

    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        <header class="main-header">

            <a href="{{route('admin')}}" class="logo">
                <span class="logo-mini"></span>
                <span class="logo-lg"><b>Admin</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </a>
                      <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                @include('admin._sidebar')
            </section>
        </aside>
        @yield('content')
        <footer class="main-footer">
            <strong>Copyright &copy; 2018 Gorkunenko Roman</strong> All rights reserved.
        </footer>
    </div>
    <script src="/js/admin.js"></script>
</body>

</html>
