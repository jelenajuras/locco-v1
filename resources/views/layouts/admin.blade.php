<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title')</title>

        <!-- Bootstrap - Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		@stack('stylesheet')
    </head>
	
<style>
	body {
		background-color: rgb(230, 230, 230);
	}
	#nav {
		background-color: rgb(77, 77, 77);
		color: rgb(255, 133, 51);
	}
	#nav1 {
		color: rgb(255, 133, 51);
	}
	#textGrey {
		color: rgb(77, 77, 77);
	}
	#inv1 {
		background-color: rgb(128,128,128);
		border-color:rgb(77, 77, 77);
		color:white;
	}
	#h3 {
		background-color: rgb(166, 166, 166);
	}
	#border1 {
    	border-style: solid;
   	 	border-width: 5px;
		border-color:rgb(77, 77, 77);
	}
</style>
	
    <body>
        <nav class="navbar navbar-default" navbar-fixed-top" id="nav">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}" id="nav1">Duplico - locco</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}" id="nav1">Dashboard</a></li>
                        @if (Sentinel::check() && Sentinel::inRole('administrator'))
                            <li class="{{ Request::is('admin/users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}" id="nav1">Djelatnici</a></li>
                            <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}" id="nav1">Dozvole</a></li>
							<li class=""><a href="{{ route('admin.cities.index') }}" id="nav1">Gradovi</a></li>
							<li class=""><a href="{{ route('admin.customers.index') }}" id="nav1">Naručitelji</a></li>
							<li class=""><a href="{{ route('admin.projects.index') }}" id="nav1">Projekti</a></li>
							<li class=""><a href="{{ route('admin.departments.index') }}" id="nav1">Odjeli</a></li>
							<li class=""><a href="{{ route('admin.cars.index') }}" id="nav1">Vozila</a></li>
                        @endif
						
						<li class=""><a href="{{ route('admin.loccos.index') }}" id="nav1">Locco vožnja</a></li>
						<li class="{{ Request::is('admin/comments*') ? 'active' : '' }}"><a href="#" id="nav1">Comments <span class="badge">{{ 2 }}</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Sentinel::check())
                          <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="user"></span> {{ Sentinel::getUser()->email }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="{{ route('auth.logout') }}" id="nav1">Odjava</a></li>
                            </ul>
                          </li>
                        @else
                            <li><a href="{{ route('auth.login.form') }}" id="nav1">Prijava</a></li>
                            <li><a href="{{ route('auth.register.form') }}" id="nav1">Registracija</a></li>
                        @endif   
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            @include('notifications')
            @yield('content')
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Restfulizer.js - A tool for simulating put,patch and delete requests -->
        <script src="{{ asset('js/restfulizer.js') }}"></script>
		@stack('script')
    </body>
</html>
