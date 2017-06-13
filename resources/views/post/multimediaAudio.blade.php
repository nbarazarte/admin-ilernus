<br><br><br><br><br><br><br>

{!! Form::open(['route' => 'editarMu3', 'id' => 'imagen-form', '', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal validate', 'data-success' => 'Se ha cambiado la imágen de perfil con éxito','data-toastr-position' => 'top-right', 'onsubmit' => 'location.reload()']) !!} 

{!! Form::input('hidden', 'id', $post->idpost, ['id' => 'id', 'class'=> 'form-control required','maxlength'=> '10', 'readonly' ]) !!}  
<fieldset>

<div class="row">
	<div class="form-group">
		<div class="col-md-12 col-sm-12">
			<label><i class="icon-append fa fa-soundcloud" aria-hidden="true"></i> Link de SoundCloud</label>
				
					
					<textarea id="str_audio" name="str_audio" class="form-control required" placeholder="Ejemplo: <iframe width=100% height=450 scrolling=no frameborder=no src=https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/323193251&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true></iframe>" rows="4" cols="350"></textarea>
					<span class="tooltip tooltip-top-right">Ingrese el link de SoundCloud</span>
				
		</div>
	</div>
</div>

</fieldset>

<div class="row">
	<div class="col-md-12">

		{!! Form::submit('CAMBIAR IMÁGEN', ['class' => 'btn btn-3d btn-teal btn-xlg btn-block margin-top-30']) !!}
		
	</div>
</div>

{!! Form::close() !!}	