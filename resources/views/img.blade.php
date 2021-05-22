<!DOCTYPE html>
<html>
<head>
	<title></title>


<style type="text/css">
*{margin: 0; padding: 0;}
.caja{
  display: flex;
  flex-flow: column wrap;
  justify-content: center;
  align-items: center;
/*  background: #333944;*/
}
.box{
  width: 25%;
  height: 30%;
  overflow: hidden;
}

.box img{
  width: 100%;
  height: auto;
}
@supports(object-fit: cover){
    .box img{
      height: 100%;
      object-fit: cover;
      object-position: center center;
    }
}
</style>


</head>
<body>


<div class="caja">
  <div class="box">
    <img src="{{asset('images/11.jpg')}}" alt="Cargando imagen...">
  </div>
</div>

</body>
</html>