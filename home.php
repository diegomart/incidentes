<?php
session_start();
if(!isset($_SESSION["codigo"])){
        header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imagenes/favicon.png">


    <title>Control Incidentes</title>

 <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
<title></title>
</head>

<body>
<div class="container">
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
       <?php  echo "<a class='navbar-brand' href='#''>Control de Incidentes de laboratorios del CUTonalá</a>  
                    <Label class='nav navbar-brand'>Código: ".$_SESSION['codigo']."</Label>" ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="registro.html">Registro</a></li>
            <li><a href="cerrar_sesion.php">Salir</a></li>
          </ul>
          
        </div>
      </div>
    </nav>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header">Procedimiento</h1>
    <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="200x200" src="imagenes/paso1.png" class="img-circle" data-holder-rendered="true">
              <h4>Paso 1</h4>
              <span class="text-muted">Registra Incidente</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="200x200" src="imagenes/paso2.png" data-holder-rendered="true">
              <h4>Paso 2</h4>
              <span class="text-muted">CTA Observa incidente</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="200x200" src="imagenes/paso3.png" data-holder-rendered="true">
              <h4>Paso 3</h4>
              <span class="text-muted">Inspecciona Incidente</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="200x200" src="imagenes/paso4.png" data-holder-rendered="true">
              <h4>Paso 4</h4>
              <span class="text-muted">Resuelve CTA incidente</span>
            </div>
          </div>
          </div>
    




 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>