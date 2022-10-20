<body>
  <style>
  .nitsuga {
    font-size:20px;
    color:blue;
    font-family:Papyrus;
  }
  .div {
    width:100px;
    height:100px;
    border-color:black;
    border-radius:7px;
    border:solid 2px;
    margin: 10px;
  }
  .div-grande {
    width: auto;
    height: auto;
  }
  .blue {
    background-color:blue;
  }
  .red {
    background-color:red;
  }
  .yellow {
    background-color:yellow;
  }
  .green {
    background-color:green;
  }
  .flex {
    display:flex;
    justify-content: center;
  }
  </style>
<?php
//Celeby estuvo aquí
//Hacer que sean varias preguntas para

  if (isset($_GET['page'])) {
    //Korko RLZ
    $page = intval($_GET['page']);
    if ($page>=0 && $page<5) {
      switch ($page) {
        case 1:
          $pregunta = "¿Que te parece el calor del verano, en una playa tropical?";
          $next = 2;
          $arr = array("Sinceramente eres un rarito.","Para ti las montañas y los arboles no son ni fu ni fa, probablemente seas un Burocrata.","Algo te llama de la naturaleza, talvez el verde y la madera. O bien te gusta viajar por el campo.","Eres un Hippie-Yippie, una persona muy feliz con poco y nada.","Que fruteas, boludo.");
          break;
        default:
          $pregunta = "Vivir en bosques montañosos, ¿Como te hace sentir?";
          $next = 1;
          $arr = array("Eres un citadino molesto vete al infierno, probablemente depresivo.","Para ti las montañas y los arboles no son ni fu ni fa, probablemente seas un Burocrata.","Algo te llama de la naturaleza, te gusta la verga con mayonesa.","Eres un Hippie-Yippie, una persona muy feliz con poco y nada.","Que fruteas, boludo.");
          break;
      }
    } else {
      echo "Sos vivo? Tu ip fue denunciada al FBI ;)";
      header('Location: '.$_SERVER['PHP_SELF'].'?page=0');
    }
  } else {
    header('Location: '.$_SERVER['PHP_SELF'].'?page=0');
  }
  echo "
    <script>
      function sumarPunto(v) {
        var respuesta = document.getElementById('respuesta');
        var content = '';
          if (v==1) {
            content = '$arr[0]';
          } else if (v==5) {
            content = '$arr[1]';
          } else if (v==8) {
            content = '$arr[2]';
          } else if (v==10) {
            content = '$arr[3]';
          } else {
            content = '$arr[4]';
          }
          respuesta.innerHTML = content;
          respuesta.style.display = 'block';
      }
    </script>";
?>
<center>
  <p>¿Test de personalidad?</p>
  <img class="div blue" src="https://www.php.net/images/logos/php-logo.svg">
    <p><?=$pregunta?></p>
    <p id="respuesta" style="display:none;color:red;"></p>
    <div class="div-grande flex">
      <div onclick="sumarPunto(1);" class="div blue"></div>
      <div onclick="sumarPunto(5);" class="div yellow"></div>
      <div onclick="sumarPunto(10);" class="div green"></div>
      <div onclick="sumarPunto(8);" class="div red"></div>
    </div>
    <form method="POST" action="<?=$_SERVER['PHP_SELF'].'?page='.$next?>">
      <input type="submit" value="Más!!" name="button">
    </form>
</center>
</body>
