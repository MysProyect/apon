@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card" style="padding-left: 2%; padding-right: 1%;">
        <div class="card-header title display-5 text-center" >Registrar Usuario</div>
          <div class="card-body">
            <form method="POST" action="{{ route('saveregist') }}">
             @csrf
              <div class="form-group">
                <input type="text" placeholder="Nombre(s)" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" >
                <input type="text" placeholder="Apellido(s)"class="form-control" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" >         
              </div>  


                <!--USERNAME-->
                <div  align="center" style="">
                  <strong style="color:#7A551E;" class="display-5">Nombre de Usuario</strong>
                  <input id="username" type="text"  name="username" value="{{ old('username') }}" class="username form-control-2" required>
                  <span class="text-muted text-center display-8"> debe contener: entre 5-10 caractes Alfa-numericos, !debe ser unico!</span> 
                  @if ($errors->has('username'))
                    <br><small class="display-7 text-danger text-center">verifique nombre de usuario</small>
                  @endif

                </div>

                  <!--PRIVILEGES-->
                <div  class="flex">
                    <div  class="">
                      <strong class="privil display-6"> Indique su role</strong>
                      <select name="role" id="role" class="form-control" value="{{ old('role') }}">
                         <option value=""> Seleccione</option>
                         @foreach($roles as $rol)
                           <option value="{{$rol->id}}">{{$rol->name}}</option>
                         @endforeach   
                      </select> 
                        @if ($errors->has('role'))
                          <div class="display-8"> indique role</div>
                        @endif                                 
                      </div>&nbsp;&nbsp;
                      <div class="">
                        <strong class="privil display-6"> Nivel</strong>
                        <select name="nivel"  class="form-control" value="{{ old('nivel') }}">
                          <option value="">Nª</option>
                          <option value="1">1</option> 
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>  
                       @if ($errors->has('nivel'))
                          <div class="display-8">indique nivel</div>                             
                        @endif  
                      </div>  &nbsp;&nbsp;                
                      <div class="img-rol-user" style="margin-left: 8%;">
                        <img src="{{asset('images/roles.png')}}"> <br><br> 
                        <img src="{{asset('images/niveles.png')}}">
                      </div>  
                  </div>



                    <!-- EMAIL -->
                  <div class="form-group">       
                    <strong>E-Mail</strong>
                    <input id="email" type="email"  class="form-control"  name="email"  placeholder="direccion@example.com"  required autocomplete="email">
                    @if ($errors->has('email'))
                      <div class="display-7 text-danger">verif email</di>                 
                    @endif 
                  </div>

                  <!-- password - CONFIRME password-->
                  <div class="form-group">
                    <strong>Password</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="text-muted display-8">debe contener: entre 5-10 caractes Alfa-numericos, ¡debe ser unico en la BD!</span>
                    <input id="password" type="password" class="form-control @error('password') errores @enderror" name="password" placeholder="Password" required>
                  </div>
                  <div class="help-block text-danger">
                    @if ($errors->first('password') )
                      <strong> las contaseña no coinside</strong>
                    @endif
                  </div>
                  <small>Confirme Password </small>
                    <input id="password-confirm" type="password" name="password_confirmation"  placeholder="Confirmatión" class="form-control" required>  
                  </div>    
                
                  <br>
                
                  <div align="center">      
                    <input type="submit" name="btnsave" class="bt-save tex-bt btn btn-primary btn-block" onclick="pregunta()" value="Guardar"/> 
                    <input type="reset" value="Borrar" class="btn btn-warning bt-canc" >
                    <img src="{{asset('images/icons/clear.png')}}"class="img-clear" style="cursor: pointer;"  title="borrar">        
                  </div>
            </form>
          </div>
        </div>
      </div>

         <div align="left" style=";">
            <a href="{{ route('AdmUser') }}" title="ir atras">
               <img src="{{ asset('images/icons/back.png') }}"  class="irAtras">
            </a> 
          </div>
  </div>
</div>


 
 <script src="{{ asset('js/forms.js') }}"></script>
 <script src="{{ asset('js/user_nivel.js') }}"></script>
@endsection
