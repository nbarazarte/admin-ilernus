
<br><br><br><br><br><br><br>

{!! Form::open(['route' => 'editarMu2', 'id' => 'imagen-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal validate', 'data-success' => 'Se ha editado el contenido multimedia con éxito','data-toastr-position' => 'top-right', 'onsubmit' => 'location.reload()']) !!} 

{!! Form::input('hidden', 'id', $post->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  





	
<div class="row"><div class="form-group"><div class="col-md-4 col-sm-4"><label>Imágen del Post N° 1<small class="text-muted">(Opcional)</small></label><input type="file" id="blb_img1" name="blb_img1" data-btn-text="Buscar Foto" class="custom-file-upload required"><small class="text-muted block">Tamaño máximo: 1Mb (jpg/png) Medidas 1200 x 500</small></div><div class="col-md-4 col-sm-4"><label>Imágen del Post N° 2<small class="text-muted">(Opcional)</small></label><input type="file" id="blb_img2" name="blb_img2" data-btn-text="Buscar Foto" class="custom-file-upload required"><small class="text-muted block">Tamaño máximo: 1Mb (jpg/png) Medidas 1200 x 500</small></div><div class="col-md-4 col-sm-4"><label>Imágen del Post N° 3<small class="text-muted">(Opcional)</small></label><input type="file" id="blb_img3" name="blb_img3" data-btn-text="Buscar Foto" class="custom-file-upload"><small class="text-muted block">Tamaño máximo: 1Mb (jpg/png) Medidas 1200 x 500</small></div></div></div>




<div class="row">
	<div class="col-md-12">

		{!! Form::submit('CAMBIAR IMÁGEN', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
		
	</div>
</div>

{!! Form::close() !!}