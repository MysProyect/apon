<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta para adaptadar web a Dispositivos Moviles-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>APON @yield('title')</title>

	<link rel="stylesheet" href="{{asset('css/fonts.css')}}">

   <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> 
   <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 

   <link rel="icon" type="image/png" href="{{asset('images/icon.png')}}" />
      @livewireStyles 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head> 


<body>
<div id="header"> 
  <nav class="navbar navbar-expand-lg navbar-dark navbar-dark-2">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class=" navbar-toggler-icon"></span>
    </button>
 
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item {{ request()->routeIs('welcome') ? 'd-lg-none' : ''}}">
        <a class="navbar-brand" href="{{ route('welcome') }}">  
          <img src="{{asset('images/Apon.png')}}" width="120" height="70" alt="Inicio" title="Inicio" style="margin-top: 40%;">
        </a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item {{ request()->routeIs('welcome') ? 'd-lg-none' : ''}} {{ request()->routeIs('cursos') ? 'active' : ''}}" >
        <a class="nav-link text-success display-5" href="{{ route('cursos-menu') }}">
          <span class="icon-rocket"></span>Cursos</a>
      </li> 
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item {{ request()->routeIs('welcome') ? 'd-lg-none' : ''}} {{ request()->routeIs('cursos') ? 'active' : ''}}"> 
       <img src="{{asset('images/AV.png')}}" class="img-menu">           
        <a class="nav-link display-6 text-warning" href="{{ route('aulas')}}">
          AulaVirtual
        </a>       
      </li>
      &nbsp;
      <li class=" nav-item {{ request()->routeIs('contactanos') ? 'active' : ''}} {{ request()->routeIs('welcome') ? 'd-lg-none' : ''}} {{ request()->routeIs('contactanos') ? 'd-lg-none' : ''}}"  >        
        <a class="" href="{{ route('contactanos') }}" data-toggle="modal" data-target="#contacModal"  style="cursor: pointer;">
        <img src="{{asset('images/icons/write.png')}}"  class="img-write-link" title="Contactacnos">
        </a>
      </li>

  <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
 </ul>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>

@livewire('comp-contactanos')

<!--   <div align="right"> 
	@if (Auth::user())
	<a href="{{ url('/logout') }}"  class="user-auth" data-toggle="dropdown" role="button" aria-expanded="false"> </a>				
	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">   
    	<li class="nav-item dropdown">
    	<div align="">
		        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  (strtoupper (Auth::user()->username) )?></a>
            <div align="center" style="align-items: center;">
  		         <a href="{{ route('Admin') }}" class="text-danger nav-link" style="">	
               <img src="{{ asset('images/icons/gestionar.png') }}" width="70" height="40" >	           
  		            @if (Auth::user())
  		            	   Administrar
  		           	@endif
  				      </a>
            </div>
		        <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
		           <li role="presentation" class="dropdown-header text-danger">
		           	<a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Salir">Cerrar Seccion
						   	</a>
							<form id="logout-form" action="{{ route('logout') }} " method="POST">
								{{ csrf_field() }}  
							</form> 
	   		</div>
	   </li>
	 </ul>
	</li>
	</ul>

			@else 
  <div >
			<a href="{{ route('login') }}"  title="Acceder como administrador" class="nav-link">
         <img src="{{asset('images/icons/acceso.png')}}" class="img-user-auth">
					Gestionar
			</a>			   		 
  </div>   	
			@endif -->




    <ul class="navbar-nav ml-auto">
             <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link display-6" href="{{ route('login') }}"><img src="{{asset('images/login.png')}}" width="80"  title="Entrar"></a>
                                </li>
                            @endif                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link display-7" href="{{ route('register') }}">{{ __('Registrarte') }}</a>
                                </li>
                            @endif
                        @else


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="text-success dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <?php echo  (strtoupper (Auth::user()->username) )?></a>
                                </a>
                                <label class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('logout') }}" class="text-danger " onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Salir">Cerrar Seccion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                                </form>
                                </label>
                            </li>
                           
                             <!--   <img src="{{asset('images/icons/acceso.png')}}" class="img-user-auth"> -->
                              
                              <li class="nav-item">
                                    <a class="nav-link text-danger display-7" href="{{ route('Admin') }}">{{ __('Gestionar') }}</a>
                                </li>
                             </a>
                          
                      
                        <!--   <div style="display: flex; width: 100%;">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="text-success dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <?php echo  (strtoupper (Auth::user()->username) )?></a>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('logout') }}" class="text-danger " onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Salir">Cerrar Seccion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                                </form>
                                </div>
                            </li>
                            <div align="center">
                             <a href="{{ route('Admin') }}"  title="Acceder como administrador" class="nav-link text-danger">
                               <img src="{{asset('images/icons/acceso.png')}}" class="img-user-auth">
                              Gestionar
                             </a>
                            </div>
                          </div>  -->
                        @endguest
<!-- 
   @if (Auth::user())
    <div>
      <a href="{{ route('Admin') }}"  title="Acceder como administrador" class="nav-link">
         <img src="{{asset('images/icons/acceso.png')}}" class="img-user-auth">
          Gestionar
      </a> 

    </div>
          
  @endif -->
    </ul>
  </nav>
</div>



<div  class=" {{ request()->routeIs('welcome') ? 'background' : ''}}" style="margin-right: %; margin-left: 15%;" >	 
<!-- <div style="margin: 2%;"> -->
	
		 @yield('content')
		@livewireScripts		      

</div>
	
		
   
<div style="margin-top: 10%; " align="center">
<footer>
  <div  class="flex">
    <div style="margin-left: 10%;">
    <label class="text-muted none display-6" style="">
        @ (2020) todos los derechos reservados -- <i>developmentsoft2020@gmail.com</i>
    </label>
  </div>
  <div class="none">
   
        <a href="https://www.facebook.com/" target="_blank" ><img src="{{asset('images/icons/Facebook.png')}}" class="img-footer" ></a>
        <a href="https://twitter.com" target="_blank"><img src="{{asset('images/icons/Twitter.png')}}" class="img-footer"></a>
        <a href="https://www.messenger.com/" target="_blank"><img src="{{asset('images/icons/Messeger.png')}}" class="img-footer"></a>
  
  </div>
  </div>

</footer>
</div>
    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <!--    <script src="http://code.jquery.com/jquery-latest.js"></script> -->
	

<script type="text/javascript">
      //cierre de modal  con id="CommentarioModal"
        window.livewire.on('savecomment', () => {
            $('#CommentModal').modal('hide');
        });
         window.livewire.on('save', () => {
            $('#contacModal').modal('hide');
        });


        window.livewire.on('Acnone', () => {
            $('#none').radio('hide');
        });
</script>

      <script src="{{ asset('js/validar.js') }}"></script>
</body>
</html>


    @yield('script')
