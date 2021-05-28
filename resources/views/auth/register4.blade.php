@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card" style="padding-left: 2%; padding-right: 1%;">
        <div class="card-header title display-5 text-center" >Registrar Usuario</div>
          <div class="card-body">


            <form method="POST" action="{{ route('saveregist') }}" id="formulario" onsubmit="return confirm('¿Confirme si desea guardar User?');">
             @csrf
            
                <div class="card"><div class="card-body">
                    <input type="text" placeholder="Nombre(s)" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" >
                    <input type="text" placeholder="Apellido(s)"class="form-control" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" >       
                    <div  align="center" style="">
                        <strong style="color:#7A551E;" class="display-6">Nombre de Usuario</strong>
                        <input id="username" type="text"  name="username" value="{{ old('username') }}" class="username form-control-2" required>
                        <span class="text-muted text-center display-8"> debe contener: entre 5-10 caractes Alfa-numericos, !debe ser unico!</span>
                        @if ($errors->has('username'))
                          <br><small class="display-7 text-danger text-center">verifique nombre de usuario</small>
                        @endif
                    </div>
                </div></div>



    <div class="card" >
          <div class="card-body">
                <div  class="flex" style="width: 100%;" align="center">
                    <div  class="">
                      <select name="role" id="role" class="form-control" value="{{ old('role') }}"  onclick="userRole()" required>
                         <option value="">Indique rol</option>
                         @foreach($roles as $rol)
                           <option value="{{$rol->id}}">{{$rol->name}}</option>
                         @endforeach   
                      </select> 
                        @if ($errors->has('role'))
                          <div class="display-8"> indique role</div>
                        @endif                                 
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;
                      <div id="nivels">
                        <div id="nivel1"><input type="radio" name="nivel" value="1"> Grud(all)</div>
                        <div id="nivel2"><input type="radio" name="nivel" value="2" > Agregar, actualizar & ver</div>
                        <div id="nivel3"><input type="radio" name="nivel" value="3"> Actualizar & ver </div>
                        <div id="nivel4"><input type="radio" name="nivel" value="4"> Ver</div>
                        @if ($errors->has('nivel'))
                          <div class="display-8">indique nivel</div>                             
                        @endif                     
                      </div>


                    <div class="img-rol-user" style="margin-left: 10%;">
                        <img src="{{asset('images/roles_niveles.png')}}"> 
                      </div> 
                    </div>
               







</div></div>



                    <!-- EMAIL -->
                  <div>       
                    <strong>E-Mail</strong>
                    <input id="email" type="email"  class="form-control"  name="email"  placeholder="direccion@example.com"  required autocomplete="email">
                    @if ($errors->has('email'))
                      <div class="display-7 text-danger">verif email</di>                 
                    @endif 
                  </div>








                  <!-- PREGUNTAS DE SEGURIDAD 3 por usuario registrado-->
<br>         
      <div class="card">
        <div class="title display-7 text-center text-danger"> Preguntas de segutidad</div>
          <div class="card-body">
                    <select name="question1" class="form-control">
                        <option value="">Seleccione...</option>
                      @foreach($quests as $q)
                        <option value="{{$q->id}}">{{$q->question}}</option>
                      @endforeach
                    </select>
                     <div  class="answer"> 
                      <input type="text" name="answer1" class="form-control" placeholder="Respuesta">
                    </div>
                   
          
                <select name="question2" class="form-control">
                        <option value="">Seleccione...</option>
                      @foreach($quests as $q)
                        <option value="{{$q->id}}">{{$q->question}}</option>
                      @endforeach
                    </select>
                    <div  class="answer" > 
                      <input type="text" name="answer2" class="form-control" placeholder="Respuesta" >
                    </div>
              </div>
            </div>
         



<br><br>



             <!-- password - CONFIRME password-->
  <div class="card">
          <div class="card-body">
                    <strong>Password</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="text-muted display-8">debe contener: entre 5-10 caractes Alfa-numericos, ¡debe ser unico en la BD!</span>
                    <input id="password" type="password" class="form-control @error('password') errores @enderror" name="password" placeholder="Password" required>
                      <input id="password-confirm" type="password" name="password_confirmation"  placeholder="Confirmatión" class="form-control" required>
                
                  <div class="help-block text-danger">
                    @if ($errors->first('password') )
                      <strong> las contaseña no coinside</strong>
                    @endif
                  </div>


      </div></div>














                
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



 

 <script src="{{ asset('js/user_role.js') }}"></script>
@endsection
