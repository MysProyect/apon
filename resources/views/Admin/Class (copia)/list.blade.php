<div style="display: flex;">
	<div style="width: 100%;">
		<h1 class="text-center display-4 text-success">Leccion's</h1>
			<div  align="right" class="cursor">
				<a wire:click="back" title="ir atras" >
			   <img src="{{ asset('images/icons/back.png') }}"  class="img-atras"></a> 
			</div>


			<br>
			<table class="table">   		
				<thead class="thead-dark"> 			
				<tr align="center" class="display-6">        			
					<th>Cursos</th>
					<th>Nª lections</th>
				</tr>
				</thead>
				<tbody> 
					<?php $i=0; ?>
				@foreach($clases as $class)    		
				<tr class="display-7">
				  
					<td>{{ $class->title  }}</td>
					
	
					
					
					@if($class->leccions_count > 0)
	            	<td class="text-center">{{ $class->leccions_count }}
						<img src="{{asset('images/icons/show.png')}}" wire:click="show_lec({{$class->id}})" style="cursor: pointer;">
	            	</td>

	            	@else
	            	<td class="text-center text-muted display-7">vacia</td>
	                @endif

	
					
					
				</tr>

				@endforeach
		      </tbody>
		      </table>
		</div>
		@if($show_lecns)
	    <div style="margin:5%; width: 30%;">
	      	@include('Admin.Class.show-lecns')
		</div>
		@endif
      
</div>

    