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
<br><br>

<?php  
$con=mysql_connect("localhost","root",""); //conexion MySQl
mysql_select_db("control_incidentes",$con); //Seleccionar base datos
$sql=" select * from incidentes"; //código MySQL
$datos=mysql_query($sql,$con);         
      ?>

<?php
/*
$fecha=date("Y-m-d h:i");

echo $fecha;
*/
?> 
 
<br><br>


   
      <table class="table table-hover" style="width: 36px" >
        <thead>
            <tr>
                <th data-field="state" data-checkbox="true"></th>
                <th data-field="id" data-align="right">ID</th>
                <th data-field="fechahora" data-align="right">Fecha</th>
                <th data-field="descripcion" data-align="right">Descripcion</th>
                <th data-field="tipoincidente" data-align="right">Tipo de incidente</th>
                <th data-field="estatus" data-align="right">Estatus</th>
                <th data-field="ubicacion" data-align="right">Ubicacion</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($row=mysql_fetch_array($datos)) {  
        ?>
            <tr> 
                 <td><?php  $idincidente=$row['idIncidente']; echo "$idincidente"?> </td>
                 <td><?php  $fechahora=$row['FechaHora'];   echo "$fechahora" ?>       </td>
                 <td><?php  $descripcion=$row['Descripcion'];   echo "$descripcion"?>       </td>
                 <td><?php  $tipoindicente=$row['TipoIncidente']; echo "$tipoindicente"?>       </td>
                 <td><?php  $estatus=$row['Estatus'];   echo "$estatus"?>       </td>
                 <td><?php  $ubicacion=$row['Ubicacion'];   echo "$ubicacion"?> 
                
            </tr>
        <?php } ?>        
        </tbody>
    </table>

<?php
mysql_close($con);//cerrar conexion

?>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>