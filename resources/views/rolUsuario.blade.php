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