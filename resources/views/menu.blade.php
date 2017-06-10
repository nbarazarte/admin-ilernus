

			<!-- 
				ASIDE 
				Keep it outside of #wrapper (responsive purpose)
			-->
			<aside id="aside">
				<!--
					Always open:
					<li class="active alays-open">

					LABELS:
						<span class="label label-danger pull-right">1</span>
						<span class="label label-default pull-right">1</span>
						<span class="label label-warning pull-right">1</span>
						<span class="label label-success pull-right">1</span>
						<span class="label label-info pull-right">1</span>
				-->
				<nav id="sideNav"><!-- MAIN MENU -->
					<ul class="nav nav-list">
						<li class="active"><!-- dashboard -->
							<a class="dashboard" href="{{ route('home')}}"><!-- warning - url used by default by ajax (if eneabled) -->
								<i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>

						@if (Auth::user()->str_rol == "Administrador")

							<li>
								<a href="#">
									<i class="fa fa-menu-arrow pull-right"></i>
									<i class="main-icon fa fa-users"></i> <span>Usuarios</span>
								</a>
								<ul><!-- submenus -->
									<li><a href="{{ route('registrar') }}">Crear Cuenta</a></li>
									<li><a href="{{ route('buscarCuenta') }}">Buscar Cuenta</a></li>
								</ul>
							</li>

						@endif

							<li>
								<a href="#">
									<i class="fa fa-menu-arrow pull-right"></i>
									<i class="main-icon fa fa-id-card-o""></i> <span>Equipo iLernus</span>
								</a>
								<ul><!-- submenus -->
									<li><a href="{{ route('registrarPi') }}">Nuevo</a></li>
									<li><a href="{{ route('buscarCuentaPi') }}">Buscar</a></li>
								</ul>
							</li>

											

						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-graduation-cap"></i> <span>Instructores</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="{{ route('registrarIns') }}">Nuevo</a></li>
									<li><a href="{{ route('buscarCuentaIns') }}">Buscar</a></li>
							</ul>
						</li>

						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-book"></i> <span>Cursos</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="#">Nuevo</a></li>
								<li><a href="#">Buscar</a></li>
							</ul>
						</li>						


						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-rss"></i> <span>Blog</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="#">Nuevo</a></li>
								<li><a href="#">Buscar</a></li>
							</ul>
						</li>						

					</ul>

				</nav>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->


			<!-- HEADER -->
			<header id="header">

				<!-- Mobile Button -->
				<button id="mobileMenuBtn"></button>

				<!-- Logo -->
				<span class="logo pull-left">
					<img src="{{ asset('smarty/assets/images/logo.png') }}" alt="logo ilernus" height="35" />
				</span>

				<form method="get" action="page-search.html" class="search pull-left hidden-xs">
					<input type="text" class="form-control" name="k" placeholder="Search for something..." />
				</form>

				<nav>

					<!-- OPTIONS LIST -->
					<ul class="nav pull-right">

						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								
	                            @if (Auth::user()->blb_img != "")
	                            	<img src="data:image/jpeg;base64,{{ Auth::user()->blb_img }}" alt="{!! Auth::user()->str_nombre !!} {!! Auth::user()->str_apellido !!}" title="{!! Auth::user()->str_nombre !!} {!! Auth::user()->str_apellido !!}" height="34">
								@else

								  @if (Auth::user()->str_genero == 'Masculino')
								  	<img src="{{ asset('smarty/assets/images/user_masculino.png') }}" alt="" height="34">								  	
								  @elseif (Auth::user()->str_genero == 'Femenino')
								  	<img src="{{ asset('smarty/assets/images/usuario_femenino.png') }}" alt="" height="34">
								  @endif

								 @endif 	

								<span class="user-name">
									<span class="hidden-xs">
										{{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
									</span>
								</span>
							</a>
							<ul class="dropdown-menu hold-on-click">

								<li><!-- settings -->
									<a href="#"><i class="fa fa-cogs"></i> Configuración</a>
								</li>

								<li class="divider"></li>

								<li><!-- logout -->
									<a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Salir</a>
								</li>
							</ul>
						</li>
						<!-- /USER OPTIONS -->

					</ul>
					<!-- /OPTIONS LIST -->

				</nav>

			</header>
			<!-- /HEADER -->

