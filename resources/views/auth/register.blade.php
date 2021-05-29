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





<!-- 
los privilegios esta definidos de la siguiente forma:
Usuario administador: opciones de drop, add, edit, show 
Usuario con privilegios: opciones de add, edit y show
Usuario colaborador: aolo edit y show
Usuario con recursos: solo puede ver

El  privilerio a determinada accion (nivel) va ir de acuerdo a la funcion y rol dentro de la empresa/organizacion sin violar la integridad de la empresa u informacion y/o operaciones de la aplicacion web-->










<!-- ROLES -->
    <div class="card" >
              <div class="title display-7 text-center text-danger"> Privilegios</div>
          <div class="card-body">
                <div  class="flex">
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


                  <div>
                        <li style="list-style:none">
                          <input type="radio" name="nivel" value="1" style="display: none;" id="nivel1">
                          <small id="rol1" style="display: none" class="display-7 text-danger">
                          <img src="{{asset('images/icons/delet.png')}}"><br>Agregar, Actualizar, Eliminar, Ver</small>
                        </li>
                        <li style="list-style:none">
                           <input type="radio" name="nivel" value="2" style="display: none;" id="nivel2">
                          <small id="rol2" style="display: none" class="display-7 text-primary"><img src="{{asset('images/icons/rol2.png')}}" width="50"><br>Agregar, Actualizar, Ver</small>
                        </li>
                        <li style="list-style:none">
                           <input type="radio" name="nivel" value="3" style="display: none;" id="nivel3">
                            <small id="rol3" style="display: none" class="display-7 text-success">
                            <img src="{{asset('images/icons/editar.png')}}"><br>Actualizar, Ver</small>
                        </li>
                        <li style="list-style:none">
                          <input type="radio" name="nivel" value="4" style="display: none;" id="nivel4">
                          <small id="rol4" class="display-6 text-warning" style="display: none">Solo
                          <img src="{{asset('images/icons/show.png')}}"><br>
                          </small>
                        </li>
                  </div>

                                  
                  <div class="img-rol-user" style="margin-left: 2%;">
                        <img src="{{asset('images/roles.png')}}" width="80" height="100"> 
                      </div> 
                  
                  <div style="width: 35%;margin-left: 10%" align="center">
                     <label>
                          <b>¿como defino un privilegio?</b><br>
                          * Usuario administador: tiene opciones de: agregar, actualizar, eliminar y ver<br>
                          <b>* Usuario con privilegios:</b> tiene opciones de agregar, actualizar y ademas ver <br>
                          * Usuario colaborador:  actualizar y ver <br>
                          <b>* Usuario con recursos:</b> solo puede ver<br>
                     </label>                    
                  </div>
                </div>
                <div class=" text-success text-center font-weight-bold font-italic">
                   <b>El  privilerio determinada la accion e ira de acuerdo a la funcion y rol dentro de la empresa/organizacion sin violar la integridad de la misma u informacion y/o operaciones de la aplicacion web</b>
                </div>






</div></div>




































                    <!-- EMAIL -->
                  <div>     
                    <input id="email" type="email"  class="form-control"  name="email"  placeholder="email@example.com"  required autocomplete="email" style="padding: 0.5%; font-size: 1.5rem;">
                    @if ($errors->has('email'))
                      <div class="display-7 text-danger">verif email</di>                 
                    @endif 
                  </div>






   <br>  

<!-- PREGUNTAS DE SEGURIDAD 3 por usuario registrado-->
          
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
                    <span class="text-muted display-8">caractes Alfa-numericos</span>
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
