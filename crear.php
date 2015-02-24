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
            $sql = "INSERT INTO usuarios (Codigo, Nombre, Carrera, Campus) VALUES ('$codigo', '$nombre', '$carrera', 'CUTonala')";
          $resultado = $conexion->mysqli->query($sql);
            $conexion->cerrar();
            header("Location: index.html");
        }
        catch(Exception $e)
        {
          echo $e;
        }
        
?>
