
		<p class="display-7 text-danger rext-right" align="center">formatos permitidos '.png, .jpg, .jpej, .mp3, .doc, .docx, .xml, .pdf, .mp4, .MPEG-4, .zip, .rar</p>
	<!-- 	<label class=" display-5 text-warning"><b>Leccion Nª <b>{{$leccion}}</label><br> -->


		
		<!--     	<img src="{{asset('images/icons/close.png')}}" wire:click="salir"  class="img-close-2 close" align="right" style="cursor: pointer;"  title="cerrar"> -->


		<form wire:submit.prevent="upload_save" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<label form="downloads">Adjuntar archivo(s)</label>
							@for($i = 0; $i < $fields; $i++)
								<input type="file" id="downloads" wire:model="files" class="form-control mb-2" accept=".png, .jpg, .jpej, .mp3, .svg, .pdf, .mp4, .MPEG-4, .zip, .rar, .doc, .docx">
								<span wire:loading wire:target="files">Uploading...</span>

									@if (session('error'))
										<span class="alert alert-success">             
											{{ session('error') }}
										</span>
									@endif

							@endfor
						@error('files')
							<label class="alert-danger">¡archivo no valido!</label>
						@enderror
						</div>
						<div class="form-group">
							<a href="#" class="btn btn-primary" wire:click.prevent="AddField"><b>Add +</b></a>
						</div>
					</div>
				</div>

				<div class="form-group">
			    	<label class="text-primary display-6">¿Video Externo (youtube)?</label>
			    	<input type="url" wire:model="urlExt" class="form-control" placeholder="insertar url https://www.youtube.com/embed">
				</div>

				<div class="form-group">
			    	<label class="text-primary display-6">¿Tienes un sitio web para a compartir?</label>
			    	<input type="url" wire:model="url" class="form-control" placeholder="https://www.google.com/">
				</div>



				<div align="center" class="form-group">
			    	<label class="text-primary display-6">Nota</label>
			    		<textarea class="nav-link form-control" wire:model="texto" rows="3"  cols="200" placeholder="Escriba informacion que considere importante o de referencia para esta seccion"></textarea>
				</div>
			


				<div class="form-group">
					<label class="display-6 text-primary">Visible
						<input type="radio" id="public" wire:model="visibility" value="1"></label>
					<label class="display-6 text-danger"> No aun
						<input type="radio" id="public" wire:model="visibility" value="0"> </label>
						@error('visibility')
							<label class="alert-danger">¿Inique si estara visible o no?</label>
						@enderror
				</div>


				<div>
		    		<button type="submit" class="btn btn-primary btn-block">Subir y Guardar información</button>
		    		 <img src="{{asset('images/icons/clear.png')}}" wire:click="clear"  class="img-clear" style="cursor: pointer;"  title="borrar">
		    		 <img src="{{asset('images/icons/close.png')}}" wire:click="default"   class="img-close-2 close" style="cursor: pointer;"  title="cerrar">
		    	</div>
	    </form>

