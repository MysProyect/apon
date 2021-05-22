<!DOCTYPE html>
<html>
 <head>
  <title>Message</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


  <!-- Styles -->
  <style>
      html, body {
          background-color: #fff;
          color: #636b6f;
          font-family: 'Nunito', sans-serif;
          font-weight: 200;
          height: 100vh;
          margin: 0;
      }
      .content { text-align: center; }
      .title { font-size: 84px; }
  </style>
 </head>
 <body>
  <br />
  <div class="container box" style="width: 970px;">
  <div style="font-size: 2rem;">Hola   
      <span style="font-weight: bold;"><b>{{ $data['name'] }}</b></span>
  </div>
   <h3 align="center" style="font-size: 1.5rem;">{{ $data['message'] }}</h3>
  </div>




 </body>
</html>