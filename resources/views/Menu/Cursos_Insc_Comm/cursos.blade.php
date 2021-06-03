<!-- VIEW CURSOS & COMMENT-->

  <div style="" align="center">
    <div>  
      <strong class="text-center text-primary-2 display-4 spad">Cursos </strong>
    </div>

      @if (session('mensaje'))
        <div class="alert alert-success">   {{ session('mensaje') }}   </div>
      @endif 
@if ($cursos->count())
  <div class="flex shearch">
    <img src="{{asset('images/icons/shearch.png')}}">
    <input type="text"   wire:model="shearCurs"  placeholder="Buscar por titulo" class="form-control">    
  </div>
  @foreach( $cursos as $curso)

  
    <div class="list-curso">
     		<p class="display-5 text-primary text-center text-uppercase" style="width: 80%;" >{{ $curso->title}}</p>				   
 	    <div align="center" class="img-curs-menu">  


      <?php  $exists = Storage::disk('local')->has($curso->img); ?>
      <div>
           @if ($exists)
              <img src="{{ Storage::url("$curso->img") }}" class="img-curs-4"/>
           @else
            
            <img src="{{$curso->img}}" class="img-curs-4">               
           @endif
      </div>


     <!--      @if($curso->img)          
              <img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" />          
          @else
              <img src="{{ asset('images/no-img.png') }}" class="img-curs"/>
          @endif -->
       
   			<div  style="padding:0; width: 50%;">	
          @if($curso->description)
          <!--   <small class="text-muted">{{$curso->description}}</small> -->
            <?php $tam = strlen($curso->description); ?>
            @if ($tam <= 200)                
              <small class="text-muted">{{$curso->description}}</small><br> 
            @elseif ($tam > 200)
             <small class="text-muted"> <?php echo substr($curso->description, 0, 200); ?>... </small>
             <img wire:click="show({{$curso->id}})" src="{{asset('images/icons/vermas.png')}}" data-toggle="modal" data-target="#CursoShow" style="width: 10%;"  title="Leer mas ..."  style="cursor: pointer;">
            @endif
   				@else
    				  <p>Descripcion No disponible</p>
    			@endif
          @if($curso->inscs_count > 0)
                <p class="display-7 text-center text-success"> {{ $curso->inscs_count }} participantes</p>   
          @endif
          @if($curso->duration)
              <small class="text-primary display-6"><br>duracion: {{$curso->duration}}</small>
          @endif
      	</div>

     
     <div style="display: flex;">
        <div align="center" style="width: 100%;">
          <input type="button" value="Participar | inscribirse"  wire:click="insc({{ $curso->id }})" class="btn btn-warning" style="">
           <img src="{{asset('images/icons/inscripcion.png')}}" width="100" height="70">
      </div>

      <!-- button y modal -->
      <div>
        @include('Menu.Cursos_Insc_Comm.info_pago')
      </div>  
   </div>

  	@if (session('comment'))
      <div class="alert alert-success">             
          <label>{{ session('comment') }}  </label>
      </div>
    @endif-->

      <!--VER COMMENTS-->
    <div align="left">
      <details>
  			<summary style="color: #0b6623;"><i class="fa fa-share"></i> See all Comments</summary>						
  				<?php $Nro = Count($curso->comments); ?>
     			@if ($Nro>0)
          			<!-- 	<label> <i><b>{{$Nro}} comentarios</b></i></label><br> -->
  					@foreach($comments as $comm)
  						@if($curso->id == $comm->curso_id)	           					                  
  						 	<div class="media-body" style=" border: 1px solid #d8d9d6;">
                  <h4 class="media-heading" >
                    <img src="{{asset('images/icons/comment.png')}}" style="width: 5%;">
                    <a href="#fakelink">{{$comm->name}}</a> 
                    <small>
                      @if($comm->created_at)
                        {{ date_format($comm->created_at, 'j M Y') }}
                      @endif
                    </small>
                  </h4>
                   <p>{{$comm->comment}}</p>
                </div>
  						@endif                  
  					@endforeach	            
  					<?php echo $comment=''; ?> 
  				@else
  				 <small class="display-8">sin comentarios...</small>
  			  @endif   
        </details>
    
        <br>       
       
            <button wire:click="comment({{ $curso->id }})" class="btn btn-primary" data-toggle="modal" data-target="#CommentModal" >Comentar</button> 
      
        </div>
  </div>
  </div> <br><br>
   @endforeach

     <div style="color:blue; margin-top: 10%;">
      {{ $cursos->links() }}
     </div>
    @include('Menu.Cursos_Insc_Comm.show-curso')

    @include('Menu.Cursos_Insc_Comm.comments')  	
@else
  <strong class="text-center text-danger display-5">No hay Cursos publicados</strong>         
@endif


