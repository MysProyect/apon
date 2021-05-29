function userRole(){
  var formulario = document.getElementById('formulario'); //formulario
  var elementos = formulario.elements; //todos los campos
  var role = formulario.role.value; //campos "
  // if(role != ""){
  //    nivels.style.display='none';
  // }
//alert(formulario.role.value);
  if(role == 1){   
    nivel1.checked = true;
    var nivel= formulario.nivel1.value; 
    rol1.style.display='block'; 
    rol2.style.display='none'; 
    rol3.style.display='none'; 
    rol4.style.display='none';
  }

  if(role == 2){
    nivel2.checked = true;  
    var nivel= formulario.nivel2.value; 
    rol2.style.display='block'; 
    rol1.style.display='none'; 
    rol3.style.display='none'; 
    rol4.style.display='none';
  }
    if(role == 3){
    nivel3.checked = true;  
    var nivel= formulario.nivel3.value; 
    rol3.style.display='block'; 
    rol1.style.display='none'; 
    rol2.style.display='none'; 
    rol4.style.display='none';
  }
    if(role == 4){
    nivel4.checked = true;  
    var nivel= formulario.nivel4.value; 
    rol4.style.display='block'; 
    rol1.style.display='none'; 
    rol3.style.display='none'; 
    rol2.style.display='none';
  }

}
