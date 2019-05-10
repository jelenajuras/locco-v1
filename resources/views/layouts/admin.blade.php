<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Date picker-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
		@stack('stylesheet')
	
	<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}" />
	
	</head>

<style>

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
	thead {
		font-size:75%;
	}
	th {
		text-align: center;
	}
	#td1 {
		text-align: center;
	}
	#myTable {
		font-size:100%;
	}
</style>
	
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="nav">
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
                        <!-- <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}" id="nav1">Dashboard</a></li> -->
                        @if (Sentinel::check() && Sentinel::inRole('administrator'))
                        <li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="nav1"><span class="caret"></span>Osnovni podaci</a>
							<ul class="dropdown-menu" id="nav">    
								<li class="{{ Request::is('admin/users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}" id="nav1">Djelatnici</a></li>
								<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}" id="nav1">Dozvole</a></li>
								<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{{ route('admin.departments.index') }}" id="nav1">Odjeli</a></li>
								<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{{ route('admin.cars.index') }}" id="nav1">Vozila</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="nav1"><span class="caret"></span>Projekti</a>
							<ul class="dropdown-menu" id="nav">
								<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{{ route('admin.cities.index') }}" id="nav1">Gradovi</a></li>
								<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{{ route('admin.customers.index') }}" id="nav1">Naručitelji</a></li>
								<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{{ route('admin.projects.index') }}" id="nav1">Projekti</a></li>
							</ul>
						 </li>
							
                        @endif
						
						<li class=""><a href="{{ route('admin.loccos.index') }}" id="nav1">Locco vožnja</a></li>
						
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Sentinel::check())
                          <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="nav1"><span class="user">
							@If(Sentinel::getUser()->first_name)
							</span> {{ Sentinel::getUser()->first_name }} <span class="caret"></span>
							@else
							</span> {{ Sentinel::getUser()->email }} <span class="caret"></span>
							@endif
							</a>
                            <ul class="dropdown-menu" id="nav">
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
        <div>
            @include('notifications')
            @yield('content')
			
        </div>

        <!-- Restfulizer.js - A tool for simulating put,patch and delete requests -->
        <script src="{{ asset('js/restfulizer.js') }}"></script>
		
		<!-- DataTables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.css"/>
		 
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script>
		
		<script>
			$(document).ready( function () {
				$('#table_id').DataTable( {
					 "order": [[ 1, "desc" ]],
					 language: {
						paginate: {
							previous: 'Prethodna',
							next:     'Slijedeća',
						},
						"info": "Prikaz _START_ do _END_ od _TOTAL_ zapisa",
						"search": "Filtriraj:",
						"lengthMenu": "Prikaži _MENU_ zapisa"
					},
					 "lengthMenu": [ 25, 50, 75, 100 ],
					 "pageLength": 50,
					  dom: 'Bfrtip',
						buttons: [
							//'copy', 'excel', 'pdf', 'print',
					/*{
						extend: 'pdfHtml5',
						text: 'Izradi PDF',
						exportOptions: {
							columns: ":not(.not-export-column)"
							}
						},*/
						{
					extend: 'excelHtml5',
					text: 'Izradi XLS',
					exportOptions: {
						columns: ":not(.not-export-column)"
					}
					},
					 ],
				});
			});
		</script>
		@stack('script')
		
		
    </body>
</html>
