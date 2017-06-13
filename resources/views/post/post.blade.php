@extends('app')

@section('content')

@include('menu')

		@foreach ($posts as $post)

		@endforeach


	<style type="text/css">

		#simple {display: none;}
		#imagen {display: none;}
		#carrusel-imagen {display: none;}
		#audio {display: none;}
		#video {display: none;}

		#defecto {display: inline;}

	</style>




			<!-- 
				MIDDLE 
			-->
			<section id="middle">

				<!-- page title -->
				<header id="page-header">
					<h1>Ver Post de iLernus</h1>
					<ol class="breadcrumb">
						<li><a href="{{ route('home')}}">Dashboard</a></li>
						<li><a href="{{ route('buscarPost')}}">Buscar Post de iLernus</a></li>
						<li class="active">Ver Post de iLernus</li>
					</ol>
				</header>

				<!-- /page title -->

				<div id="content" class="padding-20">

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

					<div class="page-profile">

						<div class="row">


							<!-- COL 2 -->
							<div class="col-md-12">

								<div class="tabs white nomargin-top">
									<ul class="nav nav-tabs tabs-primary">
										<li class="active">
											<a href="#consultar" data-toggle="tab"><i class="fa fa-address-card-o" aria-hidden="true"></i>Ver</a>
										</li>
										<li>
											<a href="#editar" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
										</li>
										<li>
											<a href="#editarMultimedia" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Multimedia</a>
										</li>
										<li>
											<a href="#eliminar" data-toggle="tab"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
										</li>										
									</ul>

									<div class="tab-content">

										<!-- Overview -->

										<!-- Consultar -->
										<div id="consultar" class="tab-pane active">

											<div class="form-horizontal">
												<h4>Datos del Post</h4>

													<section class="panel">

														<div class="panel-body noradius padding-10">

															  @if ($post->str_tipo == 'simple')
															  	<center>
																  	<figure class="margin-bottom-10"><!-- image -->
																  		<i class="fa fa-newspaper-o" aria-hidden="true"></i>
																  	</figure>
															  	</center>						  	
															  @elseif ($post->str_tipo == 'audio')
															  	<center>
																  	{!! html_entity_decode($post->str_audio) !!} 
															  	</center>
															  @elseif ($post->str_tipo == 'video')
															  	<center>
																	<iframe class="embed-responsive-item" src="{{ $post->str_video }}" width="800" height="400"></iframe>
															  	</center>
															  @elseif ($post->str_tipo == 'carrusel-imagen')
															  	<center>
																  	<figure class="margin-bottom-10"><!-- image -->

																  		<div class="row">
																  			<div class="col-md-4">
																  				<img class="img-responsive" src="data:image/jpeg;base64,{{ $post->blb_img1 }}" alt="" title="" width="410">
																  			</div>
																  			<div class="col-md-4">
																  				<img class="img-responsive" src="data:image/jpeg;base64,{{ $post->blb_img2 }}" alt="" title="" width="410">
																  			</div>

																  			@if(!empty($post->blb_img3))

																  			<div class="col-md-4">
																  				<img class="img-responsive" src="data:image/jpeg;base64,{{ $post->blb_img3 }}" alt="" title="" width="410">
																  			</div>

																  			@endif
																  		</div>	

																  	</figure>
															  	</center>
															  @elseif ($post->str_tipo == 'imagen')
															  	<center>
																  	<figure class="margin-bottom-10"><!-- image -->
																  		
																  		<img src="data:image/jpeg;base64,{{ $post->blb_img1 }}" alt="" title="" width="410">
																  	</figure>
															  	</center>
															  @endif

														
															
															

														</div>
													</section>

												<fieldset>

													<div class="form-group">
														<label class="col-md-3 control-label" for="">Título</label>
														<div class="col-md-8">
															<input type="text" readonly="yes" class="form-control" id="" value="{{ str_replace("-"," ",$post->str_titulo)}}">
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="">Tipo</label>
														<div class="col-md-8">
															<input type="text" readonly="yes" class="form-control" id="" value="{{ $post->str_tipo }}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="">Autor</label>
														<div class="col-md-8">
															<input type="text" readonly="yes" class="form-control" id="" value="{{ $post->autor }}">
														</div>
													</div>


													<div class="form-group">
														<label class="col-md-3 control-label" for="">Post (resumen)</label>
														<div class="col-md-8">
															
															{!! html_entity_decode($post->str_post_resumen) !!}

														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="">Post</label>
														<div class="col-md-8">
															{!! html_entity_decode($post->str_post) !!}
														</div>
													</div>	

												</fieldset>

											</div>

										</div>										

										<!-- Editar -->
										<div id="editar" class="tab-pane">

											{!! Form::open(['route' => 'editarPost', 'id' => 'demo-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal ', 'data-success' => 'Se han editado los datos personales con éxito','data-toastr-position' => 'top-right', 'onsubmit' => 'location.reload()']) !!} 												
												<h4>Datos Personales</h4>

												{!! Form::input('hidden', 'id', $post->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  

												<fieldset>

													<div class="form-group">
														<label class="col-md-3 control-label" for="str_nombre">Título</label>
														<div class="col-md-8">
															{!! Form::input('text', 'str_titulo', str_replace("-"," ",$post->str_titulo), ['id' => 'str_nombre', 'class'=> 'form-control required','maxlength'=> '255']) !!} 
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="str_profesion">Autor</label>
														<div class="col-md-8">
															<select name="lng_idautor" class="form-control pointer required">
																<option value="">--- Seleccione ---</option>

																@foreach ($autores as $clave => $value)
																				
																<option value="{{$clave}}" <?php if ($value == $post->autor) {?> selected <?php }?> >{{$value}}</option>

																@endforeach

															</select>
														</div>
													</div>


													<div class="form-group">
														<label class="col-md-3 control-label" for="">Post (resumen)</label>
														<div class="col-md-8">
															
															
															<textarea name="str_post_resumen" class="summernote form-control required" data-height="200" data-lang="en-US">
																{!! html_entity_decode($post->str_post_resumen) !!}
															</textarea>

														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label" for="">Post</label>
														<div class="col-md-8">
															<textarea name="str_post" class="summernote form-control required" data-height="200" data-lang="en-US">
																{!! html_entity_decode($post->str_post) !!}
															</textarea>
														</div>
													</div>	
																														
												</fieldset>

												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														{!! Form::submit('MODIFICAR POST', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
													</div>
												</div>												

												{!! Form::close() !!}

										</div>

										<div id="editarMultimedia" class="tab-pane">


										<div class="form-group">
											<label class="col-md-12 control-label" for="name">Tipo</label>
											<div class="col-md-12">
												<select name="str_tipo" class="form-control pointer required" onchange="showfieldTipo(this.options[this.selectedIndex].value)">
													

													
													@foreach ($tipopost as $value)
																	
													<option value="{{$value}}" <?php if ($value == $post->str_tipo) {?> selected <?php }?> >{{$value}}</option>

													@endforeach
												</select>
											</div>
										</div>



												<div id="defecto">
													
													@if($post->str_tipo == 'simple')

														@include('post.multimediaSimple')

													@endif

													@if($post->str_tipo == 'imagen')

														@include('post.multimediaImagen')

													@endif

													@if($post->str_tipo == 'carrusel-imagen')

														@include('post.multimediaCarruselImagen')

													@endif

													@if($post->str_tipo == 'audio')

														@include('post.multimediaAudio')

													@endif

													@if($post->str_tipo == 'video')

														@include('post.multimediaVideo')

													@endif

												</div>

												<div id="simple">
													
													@include('post.multimediaSimple')

												</div>

												<div id="imagen">
													
													@include('post.multimediaImagen')

												</div>

												<div id="carrusel-imagen">
													
													@include('post.multimediaCarruselImagen')
	
												</div>

												<div id="audio">

													@include('post.multimediaAudio')

												</div>

												<div id="video">
													
													@include('post.multimediaVideo')

												</div>

										</div>

										<div id="eliminar" class="tab-pane">

												{!! Form::open(['route' => 'eliminarImagenIns', 'id' => 'clave-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal validate', 'data-success' => 'Se ha enviado la nueva clave al instructor con éxito','data-toastr-position' => 'top-right', 'onsubmit' => 'location.reload();']) !!} 	
												<h4>Imágen de Perfil</h4>
												{!! Form::input('hidden', 'id', $post->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  


												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														{!! Form::submit('ELIMINAR IMÁGEN', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
													</div>
												</div>

												{!! Form::close() !!}

											<hr class="invisible half-margins" />

												{!! Form::open(['route' => 'eliminarCuentaIns', 'id' => 'clave-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal validate', 'data-success' => 'Se ha enviado la nueva clave al instructor con éxito','data-toastr-position' => 'top-right', 'onsubmit' => 'location.reload();']) !!} 	
												<h4>Eliminar Cuenta</h4>
												{!! Form::input('hidden', 'id', $post->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  


												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														{!! Form::submit('ELIMINAR CUENTA', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
													</div>
												</div>

												{!! Form::close() !!}											


										</div>

									</div>
								</div>

							</div><!-- /COL 2 -->



						</div>

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->











<script type="text/javascript">


	function showfieldTipo(name){


		if(name=='simple'){
	  	
	  			document.getElementById('simple').style.display='inline';
	  		document.getElementById('imagen').style.display='none';
	  		document.getElementById('carrusel-imagen').style.display='none';
	  		document.getElementById('audio').style.display='none';
	  		document.getElementById('video').style.display='none';
	  		document.getElementById('defecto').style.display='none';

	  	}else if (name=='imagen'){ 

	  		document.getElementById('simple').style.display='none';
	  			document.getElementById('imagen').style.display='inline';
	  		document.getElementById('carrusel-imagen').style.display='none';
	  		document.getElementById('audio').style.display='none';
	  		document.getElementById('video').style.display='none';
	  		document.getElementById('defecto').style.display='none';		

		}else if (name=='carrusel-imagen'){ 

	  		document.getElementById('simple').style.display='none';
	  		document.getElementById('imagen').style.display='none';
	  			document.getElementById('carrusel-imagen').style.display='inline';
	  		document.getElementById('audio').style.display='none';
	  		document.getElementById('video').style.display='none';
	  		document.getElementById('defecto').style.display='none';  		

		}else if (name=='video'){ 

	  		document.getElementById('simple').style.display='none';
	  		document.getElementById('imagen').style.display='none';
	  		document.getElementById('carrusel-imagen').style.display='none';
	  		document.getElementById('audio').style.display='none';
	  			document.getElementById('video').style.display='inline';
	  		document.getElementById('defecto').style.display='none';

		}else if (name=='audio'){ 

	  		document.getElementById('simple').style.display='none';
	  		document.getElementById('imagen').style.display='none';
	  		document.getElementById('carrusel-imagen').style.display='none';
	  			document.getElementById('audio').style.display='inline';
	  		document.getElementById('video').style.display='none';
	  		document.getElementById('defecto').style.display='none';

		}

	}


	function showfield(name){

		if(name=='youtube'){
	  	
	  		document.getElementById('div1').innerHTML='<label class="input"><i class="icon-append fa fa-youtube-play" aria-hidden="true"></i><input type="text" class="form-control pointer required" name="str_video" placeholder="Ejemplo: http://www.youtube.com/embed/W7Las-MJnJo"/><span class="tooltip tooltip-top-right">Ingrese el link de Youtube</span></label>';

	  	}else if (name=='vimeo'){ 

	  		document.getElementById('div1').innerHTML='<label class="input"><i class="icon-append fa fa-vimeo" aria-hidden="true"></i><input type="text" class="form-control pointer required" name="str_video" placeholder="Ejemplo: http://player.vimeo.com/video/8408210"/><span class="tooltip tooltip-top-right">Ingrese el link de Vimeo</span></label>';

		}

	}

</script>
@endsection