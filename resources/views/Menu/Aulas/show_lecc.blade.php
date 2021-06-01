<div  class="form-gruop" align="center" style="margin-top: 2%;">


<p class="display-8">el diseño de esta vista, esta sujeto a cambios por el administrador de la aplicacion</p>


	<div  align="right">
		<a wire:click="back" title="ir atras">
	   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
	</div>

	<div align="center" class="text-primary display-5 spand">
		Leccion {{$lecId->leccion}}	
	</div>	<br><br>

		
	<!-- Gallery -->
<div class="row container-2" align="center">

  	     @foreach($lecfiles as $fl)
		        	<?php if(Str::endsWith($fl->file,['.png','.jpg','.jpeg','.gif','.bmp', '.gim','svg'])){ ?>
		                 <a target="_blank"  href='/storage/{{$fl->file}}' class="cursos" title="ver/dowload" >
		                   	 <img src="{{ Storage::url("$fl->file") }}" alt="Archivo no encontrado" >	
			             </a>
		              <?php }?>
		        @endforeach

</div>
<!-- Gallery -->

		<div class="container-2">
			@foreach($lecfiles as $fl)
				<?php if(Str::endsWith($fl->file,['.mp4','.MPEG-4', '.mwv', '.avi'])){	?>
						<div align="center">
							<video  id="video-curs-2" autoplay loop muted >
								<source src="{{ Storage::url($fl->file)}}" type="video/mp4" class="cursor" style="cursor: move;  width: 5%;">
							</video>
						</div>	
				<?php }?>
			@endforeach
		</div>

		<div class="container-2 change">
				<div>
					@foreach($lecfiles as $fl)					
					<?php if(Str::endsWith($fl->file,['docx','.doc','.pdf', '.zip','.rar'])){?>						
						<img src="{{asset('images/icons/documnt.svg')}}" style="width: 40%; height: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;
						<div style="display: block;" align="center">
								<a target="_blank" href="{{ Storage::url($fl->file)}}">{{$fl->name_file}}</a>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php }?>
				@endforeach
				</div>
				<div>
					@if($lecId->urlExt)
				 		 <iframe width="1000" height="415" src="<?php echo $lecId->urlExt ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
					@endif
				</div>
			</div>
	<br>
	<div >

	
	
	</div>
@if(!($lecfiles->count() && $lecId))
	<label class="text-center display-6 text-danger">Esta Leccion esta Vacia </label>
@endif
<br>
@if($lecId->texto)
	<div  class="" style=" border: white 8px inset;">
		Texto:
		<label>{{$lecId->texto}}</label>
	</div>
@endif
@if ($lecId->url)
	<div>
		<b>Visite:</b> <a target="_blank" href="{{$lecId->url}}">{{$lecId->url}}</a>
	</div>
@endif
</div>











<!-- Carousel wrapper -->
<div
  id="carouselVideoExample"
  class="carousel slide carousel-fade"
  data-mdb-ride="carousel"
>
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
      <video class="img-fluid" autoplay loop muted>
        <source src="https://mdbootstrap.com/img/video/Tropical.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>
          Nulla vitae elit libero, a pharetra augue mollis interdum.
        </p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <video class="img-fluid" autoplay loop muted>
        <source src="https://mdbootstrap.com/img/video/forest.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <video class="img-fluid" autoplay loop muted>
        <source
          src="https://mdbootstrap.com/img/video/Agua-natural.mp4"
          type="video/mp4"
        />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>
          Praesent commodo cursus magna, vel scelerisque nisl consectetur.
        </p>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button
    class="carousel-control-prev"
    type="button"
    data-mdb-target="#carouselVideoExample"
    data-mdb-slide="prev"
  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next"
    type="button"
    data-mdb-target="#carouselVideoExample"
    data-mdb-slide="next"
  >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->






