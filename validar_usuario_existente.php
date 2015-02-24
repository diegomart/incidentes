
<?php
require_once('conexion.php');

    $codigo=$_POST['txtCodigo'];
$nombre=$_POST['txtNombre'];
$carrera=$_POST['txtCarrera'];
//$campus=$_POST['txtCampus'];

try
        {
            $conexion = new Conexion();
            if(!$conexion->conectar())
            {
                throw new Exception($conexion->getError());
            }
            $query_seleccion = "SELECT * FROM usuarios WHERE Codigo='".$codigo."'";
            $codigo_seleccionado = $conexion->mysqli->query($query_seleccion);
            $codigo_obtenido = $codigo_seleccionado->fetch_assoc();
            $conexion->cerrar();

    echo "<h2>NOMBRE:</h2> <label>".$codigo_obtenido['Codigo']."</label>";
    if ($codigo_obtenido!=$codigo) {
                echo "El usuario ya existe";
                header("Location: registro.html");
            }else{
               header("Location: crear.html");
            }

        }
        catch(Exception $e)
        {
          echo $e;
        }
        
        
?>

</body>
</html>
