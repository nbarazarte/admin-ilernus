{!! Form::open(['route' => 'editarMu', 'id' => 'imagen-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal ', 'data-success' => 'Se ha cambiado la imágen de perfil con éxito','data-toastr-position' => 'top-right', 'onsubmit' => '']) !!} 
												<h4>Imágen de Perfil</h4>
												{!! Form::input('hidden', 'id', $post->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  
												<fieldset>

													<div class="form-group">
														<div class="sky-form">
															<label>
																<small class="text-muted">(Opcional)</small>
															</label>

															{!! Form::file('blb_img1',['id' => 'blb_img1','data-btn-text' =>'Buscar Foto', 'class' => 'custom-file-upload required']) !!}

															<small class="text-muted block">Tamaño máximo: 1Mb (jpg/png)</small>
														
														</div>
													</div>


												</fieldset>

												<div class="row">
													<div class="col-md-9 col-md-offset-3">

														{!! Form::submit('CAMBIAR IMÁGEN', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
														
													</div>
												</div>

												{!! Form::close() !!}