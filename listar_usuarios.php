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


<?php

/*
class ListarContactos
{
    public $contactos;
    public function generaTabla()
    {
        echo '<table>';
             echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Apellido Paterno</th>';
                echo '<th>Apellido Materno</th>';
                echo '<th>Nombre</th>';
                echo '<th>Domicilio</th>';
                echo '<th>Colonia</th>';
                echo '<th>C&oacute;digo Postal</th>';
                echo '<th>Municipio</th>';
                echo '<th>Estado</th>';
                echo '<th>Pa&iacute;s</th>';
                echo '<th>Mapa</th>';
                echo '<th>Tel&eacute;fono</th>';
                echo '<th>Celular</th>';
                echo '<th>Radio</th>';
                echo '<th>Email</th>';
                echo '<th>Observaciones</th>';
                echo '<th>saved_at</th>';
                echo '<th>modified_in</th>';
            echo '</tr>';
            foreach($this->contactos as $contacto){
                echo '<tr>';
                    echo '<td>'.$contacto['id']. '</td>';
                    echo '<td>'.$contacto['ap'].'</td>';
                    echo '<td>'.$contacto['am'].'</td>';
                    echo '<td>'.$contacto['nombre'].'</td>';
                    echo '<td>'.$contacto['domicilio'].'</td>';
                    echo '<td>'.$contacto['colonia'].'</td>';
                    echo '<td>'.$contacto['cp'].'</td>';
                    echo '<td>'.$contacto['municipio'].'</td>';
                    echo '<td>'.$contacto['estado'].'</td>';
                    echo '<td>'.$contacto['pais'].'</td>';
                    echo '<td>'.$contacto['mapa'].'</td>';
                    echo '<td>'.$contacto['telefono'].'</td>';
                    echo '<td>'.$contacto['celular'].'</td>';
                    echo '<td>'.$contacto['radio'].'</td>';
                    echo '<td>'.$contacto['email'].'</td>';
                    echo '<td>'.$contacto['observaciones'].'</td>';
                    echo '<td>'.$contacto['saved_at'].'</td>';
                    echo '<td>'.$contacto['modified_in'].'</td>';
                echo '</tr>';
            }
        echo "</table>";
    }
}
*/
?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>