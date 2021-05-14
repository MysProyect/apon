
	 @if (session('mensaje'))
		<div class="alert alert-success">             
		{{ session('mensaje') }}
		</div>
	 @endif
	@if(asset($cursos))

		
	<table class="table" style="align-items: center;">   		
		<thead class="thead-dark"> 			
		<tr align="center" style="vertical-align:middle;" >   
				<th scope="">Course</th>
				<th scope="">Valid/Exp</th>
				<th><img src="{{asset ('images/icons/show.png')}}" width="50"></th>
			</tr>
		</thead>
		<tbody>	
		@foreach($cursos as $curso) 		
			<tr>

				<td class="text-center" style="vertical-align:middle;" >
					
					@if($curso->statud == 1)
						<span class="text-primary  text-uppercase display-7">{{$curso->title}}</span>
					@else
						<span class="text-uppercase display-7 text-muted">{{$curso->title}}&nbsp;&nbsp;&nbsp; </span><small class="display-8">No publicado</small>
					@endif
				</td>



				</td>

				<td align="center" class="" style="vertical-align:middle;" >
					
						<span class="display-7 ">{{$curso->inscs_count}}</span>
						<img src="{{asset ('images/icons/valid.png')}}" wire:click="ConfIns({{ $curso->id }})" width="40" title="confirmar inscripción" class="cursor">
					
				</td>					
	
				<td align="center" class="ver-insc" style="vertical-align:middle;" >
					<img src="{{asset ('images/icons/ver.png')}}" wire:click="ver({{ $curso->id }})" class="all-scroll cursor" width="30" title="ver">		
				</td>
			</tr>	
		@endforeach		
		</tbody>
		
	</table>

	 <div style="color:blue;">
			{{ $cursos->links() }}
     </div>
        <div align="right">
     	 <a href="">
      	<img src="{{asset('images/icons/impress.png')}}">Exportar
      </a>
     </div>
  @else
  	<label>No hay inscritos</label>   
  @endif

