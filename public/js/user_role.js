function userRole(){
  var formulario = document.getElementById('formulario'); //formulario
  var elementos = formulario.elements; //todos los campos
  var role = formulario.role.value; //campos "
  // if(role != ""){
  //    nivels.style.display='none';
  // }

  if(role == 1){ 
    //alert("seguro de dar todos los privilegios a este usuario");
    nivel1.style.display='block';
    r1.style.display='block';
    nivel2.style.display='none';
    nivel3.style.display='none';
    nivel4.style.display='none';
    formulario.nivel2.value = '';
    formulario.nivel3.value = '';
    formulario.nivel4.value = '';
   
  }
  if(role == 2){
    r1.style.display='none';
    nivel1.style.display='none';
    
    nivel2.style.display='block';
    r2.style.display='block';

    nivel3.style.display='none';
    nivel4.style.display='none';
    formulario.nivel1.value = '';
    formulario.nivel3.value = '';
    formulario.nivel4.value = '';
  }
  if(role == 3){
    nivel1.style.display='none';
    nivel2.style.display='none';
    nivel3.style.display='block';
    nivel4.style.display='none';
    formulario.nivel1.value = '';
    formulario.nivel2.value = '';
    formulario.nivel4.value = '';
  }
  if(role == 4){
    nivel1.style.display='none';
    nivel2.style.display='none';
    nivel3.style.display='none';
    nivel4.style.display='block';
    formulario.nivel1.value = '';
    formulario.nivel.value = '';
    formulario.nivel3.value = '';
  }
}
