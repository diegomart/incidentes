<?php
require_once('conexion.php');

        try
        {
          $codigoObtenido=$_POST['txtCodigoInicio'];
          if($codigoObtenido=='%d=%d'){
               header("Location: index.html");
          }else{
            $resultado = array();
            $conexion = new Conexion();
            if(!$conexion->conectar())
            {
                throw new Exception($conexion->getError());
            }
            $sql = "SELECT * FROM usuarios WHERE Codigo = $codigoObtenido;";
            $sql = htmlentities($sql);
            if ($result = $conexion->mysqli->query($sql))
            {
                if ($result->num_rows == 1) 
                {
                    session_start();
                    $_SESSION["codigo"] = $codigoObtenido;
                    header("Location: home.php");
               }else{
                    header("Location: index.html");
               }

            }
            
            $conexion->cerrar();
            return $resultado;
          }
        }
        catch(Exception $e)
        {
            return array();
        } 
   
 ?>