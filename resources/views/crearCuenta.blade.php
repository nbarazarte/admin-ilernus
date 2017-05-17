@extends('app2')

@section('content')


			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Crear Cuenta</h1>
					<ol class="breadcrumb">
						<li><a href="#">Inicio</a></li>
						<li class="active">Crear Cuenta</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">

						<div class="col-md-12">

							<!-- ------ -->
							<div class="panel panel-default">

			                    @if (Session::has('errors'))

			                        <div class="alert alert-danger alert-dismissible" role="alert">
			                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                  <ul>
			                                    <!-- <strong>Oops! Something went wrong : </strong> -->
			                                    <strong>Por favor complete los siguientes campos: </strong>
			                                    @foreach ($errors->all() as $error)
			                                         <li>{{ $error }}</li>
			                                    @endforeach
			                                </ul>
			                        </div>

			                    @endif

                    			@if(Session::has('message'))
					            
									<div class="alert alert-success" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									  <span aria-hidden="true">&times;</span></button>
									  <strong><i class="fa fa-check"></i></strong> {{Session::get('message')}}
									</div> 							
							
								@endif

								<div class="panel-heading panel-heading-transparent">
									<strong>Datos del Usuario</strong>
								</div>

								<div class="panel-body">

								{!! Form::open(['route' => 'registrar', 'id' => 'demo-form', '', 'enctype'=>'multipart/form-data', 'class' => 'sky-form boxed', '' => '','data-toastr-position' => 'top-right']) !!} 										

											<fieldset>
												
												<!-- required [php action request] -->
												<input type="hidden" name="action" value="contact_send" />


												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">

															<label>Usuario *</label>

															<label class="input">
																<i class="icon-append fa fa-user-secret"></i>
																<input type="text" name="name" value="" class="form-control required">
																<span class="tooltip tooltip-top-right">Ingrese un nick de usuario</span>
															</label>

														</div>
														<div class="col-md-6 col-sm-6">
															<label>Sexo *</label>
															<label class="input margin-bottom-10">
																<i class="icon-append fa fa-venus-mars" aria-hidden="true"></i>
																<select id="str_genero" name="str_genero" class="form-control pointer required">
																	<option value="">--- Seleccione ---</option>
																	<option value="F">Femenino</option>
																	<option value="M">Masculino</option>
																</select>
																<span class="tooltip tooltip-top-right">seleccione el género del usuario</span>
															</label>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Nombre *</label>
	
															<label class="input">
																<i class="icon-append fa fa-user"></i>
																<input type="text" name="str_nombre" value="" class="form-control required">
																<span class="tooltip tooltip-top-right">Ingrese el nombre del usuario</span>
															</label>

														</div>
														<div class="col-md-6 col-sm-6">
															<label>Apellido *</label>
															<label class="input">
																<i class="icon-append fa fa-user"></i>
																<input type="text" name="str_apellido" value="" class="form-control required">
																<span class="tooltip tooltip-top-right">Ingrese el apellido del usuario</span>
															</label>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Cédula *</label>
															<label class="input">
																<i class="icon-append fa fa-id-card-o""></i>
																<input type="text" id="str_cedula" name="str_cedula" class="form-control masked" data-format="99999999" data-placeholder="X" placeholder="Ej.:05888777">
																<span class="tooltip tooltip-top-right">Ingrese la cédula del usuario</span>
															</label>
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Teléfono *</label>
															<label class="input">
																<i class="icon-append fa fa-volume-control-phone" aria-hidden="true"></i>
																<input type="text" class="form-control masked required" id="str_telefono" name="str_telefono" data-format="(9999) 999-9999" data-placeholder="0" placeholder="Ej.: (0414) 555-4433">
																<span class="tooltip tooltip-top-right">Ingrese la cédula del usuario</span>
															</label>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Gerencia *</label>
															<select name="str_departamento" class="form-control pointer required">
																<option value="">--- Seleccione ---</option>
																<option value="Recursos Humanos">Recursos Humanos</option>
																<option value="Mercadeo">Mercadeo</option>
																<option value="Tecnología">Tecnología</option>
															</select>
														</div>
	
														<div class="col-md-6 col-sm-6">

															<label>Correo Electrónico *</label>															
															<label class="input">
																<i class="icon-append fa fa-envelope"></i>
																<input id="email" name="email" type="email" class="form-control required">
																<span class="tooltip tooltip-top-right">Ingrese su dirección de correo electrónico</span>
															</label>

														</div>
													</div>
												</div>												

												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">

															<label>Rol *</label>
															<label class="input margin-bottom-10">
																<i class="icon-append fa fa-eye" aria-hidden="true"></i>
																<select id="str_rol" name="str_rol" class="form-control pointer required">
																	<option value="">--- Seleccione ---</option>
																	<option value="Administrador">Administrador</option>
																	<option value="Usuario">Usuario</option>
																</select>
																<b class="tooltip tooltip-bottom-right">Rol</b>
															</label>

														</div>
														<div class="col-md-6 col-sm-6">
															<label>Clave *</label>															
															<label class="input">
																<i class="icon-append fa fa-key" aria-hidden="true"></i>
																<input class="form-control required" id="password" name="password" type="password">
																<span class="tooltip tooltip-top-right">Ingrese la clave de usuario</span>
															</label>

														</div>
													</div>
												</div>


												<div class="row">
													<div class="form-group">
														<div class="col-md-12">
															<label>
																Foto
																<small class="text-muted">(Opcional)</small>
															</label>

															

															{!! Form::file('blb_img',['id' => 'blb_img','data-btn-text' =>'Buscar Foto', 'class' => 'custom-file-upload']) !!}


															<small class="text-muted block">Tamaño máximo: 1Mb (jpg/png)</small>														

														</div>
													</div>
												</div>

											</fieldset>

											<div class="row">
												<div class="col-md-12">
													<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
														CREAR CUENTA
													</button>
												</div>
											</div>

										{!! Form::close() !!}

								</div>

							</div>
							<!-- /----- -->

						</div>


					</div>

				</div>
			</section>
			<!-- /MIDDLE -->




@endsection