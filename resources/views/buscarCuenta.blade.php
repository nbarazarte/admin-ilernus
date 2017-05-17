@extends('app2')

@section('content')

					<?php

							foreach ($usuarios as $usuario) {

							    $arr =  array(

							    			'cedula' => $usuario->str_cedula,
							    			'usuario' => $usuario->name, 
							    			'nombre' => $usuario->str_nombre.' '.$usuario->str_apellido, 
							    			'genero' => $usuario->str_genero, 
							    			'correo' => $usuario->email, 
							    			'telefono' => $usuario->str_telefono,
							    			'departamento' => $usuario->str_departamento, 
							    			'rol' => $usuario->str_rol	

							    		);

							    $valores[] = $arr;	

							}	

							//print_r($valores);
							//echo $datos = json_encode($valores);
							$datos = json_encode($valores);
					?>

			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Buscar Cuenta</h1>
					<ol class="breadcrumb">
						<li><a href="#">Inicio</a></li>
						<li class="active">Buscar Cuenta</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<!-- 
						PANEL CLASSES:
							panel-default
							panel-danger
							panel-warning
							panel-info
							panel-success

						INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
								All pannels should have an unique ID or the panel collapse status will not be stored!
					-->
					<div id="panel-1" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>LISTADO DE USUARIOS</strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Minimizar" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Pantalla Completa" data-placement="bottom"><i class="fa fa-expand"></i></a></li>

							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover" id="datatable_sample">
								<thead>
									<tr>

										<th>Cédula</th>
										<th>Usuario</th>
										<th>Nombre</th>
										<th>Género</th>
										<th>Departamento</th>
										<th>Teléfono</th>
										<th>Rol</th>
										<th>Estatus</th>
									</tr>
								</thead>

								<tbody>

									@foreach ($usuarios as $usuario)
									
										<tr class="odd gradeX">


												<td>
														{{ $usuario->str_cedula }}
												</td>
												<td>
														{{ $usuario->name }}
												</td>
												<td>
													 	{{ $usuario->str_nombre }} {{ $usuario->str_apellido }}
												</td>
												<td class="center">

														{{ $usuario->str_genero }}
												</td>
												<td>
													 	{{ $usuario->str_departamento }}
												</td>
												<td>
													 	{{ $usuario->str_telefono }}
												</td>
												<td>
													 	{{ $usuario->str_rol }}
												</td>																																	
												<td>
													<span class="label label-sm label-success">
														
														Approved

													</span>
												</td>

										</tr>

									@endforeach

								</tbody>
							</table>

						</div>
						<!-- /panel content -->

					</div>
					<!-- /PANEL -->

				</div>
			</section>
			<!-- /MIDDLE -->

@endsection