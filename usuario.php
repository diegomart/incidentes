<?php
require_once('conexion.php');
class Usuario
{
    public function encontrarTodos()
    {
        try
        {
            $resultado = array();
            $conexion = new Conexion();
            if(!$conexion->conectar())
            {
                throw new Exception($conexion->getError());
            }
            $sql = "SELECT * FROM contacto";
            if ($result = $conexion->mysqli->query($sql))
            {
                if ($result->num_rows > 0) 
                {
                     while($row = $result->fetch_assoc())
                     {
                        var_dump($row);
                         $resultado[] = $row;
                     }exit;
                }
            }
            $conexion->cerrar();
            return $resultado;
        }
        catch(Exception $e)
        {
            return array();
        } 
    }
    public function nuevo()
    {
        $codigo = $_POST['txtCodigo'];
        $nombre = $_POST['txtNombre'];
        $carrera = $_POST['txtCarrera'];
        $campus = $_POST['txtCampus']
        try
        {
            $conexion = new Conexion();
            if(!$conexion->conectar())
            {
                throw new Exception($conexion->getError());
            }
            $sql = "INSERT INTO `usuarios` ".
                "(`codigo`, `nombre`, `carrera`, `campus`) ".
                "VALUES ".
                "(". 
                "'00003', '00004', 'her@gmail.com', 'Registro nuevo', '".date("Y-m-d")."');";
            $resultado = $conexion->mysqli->query($sql);
            $conexion->cerrar();
            return $resultado;
        }
        catch(Exception $e)
        {
            return false;
        } 
    }
    private function obtenerUltimo()
    {
        try
        {
            $resultado = array();
            $conexion = new Conexion();
            if(!$conexion->conectar())
            {
                throw new Exception($conexion->getError());
            }
            $sql = 'SELECT * FROM contacto ORDER BY id DESC LIMIT 1';
            if ($result = $conexion->mysqli->query($sql))
            {
                if ($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    $resultado = $row; 
                }
            }
            $conexion->cerrar();
            return $resultado;
        }
        catch(Exception $e)
        {
            return array();
        }
    }
    public function editarUltimo()
    {
        try
        {
            $ultimo = $this->obtenerUltimo();
            $conexion = new Conexion();
            if(!$conexion->conectar())
            {
                throw new Exception($conexion->getError());
            }
            $sql = "UPDATE `contacto` SET `observaciones`='editado el ".date('Y-m-d H:i:s')."', `modified_in`='".date('Y-m-d H:i:s')."' WHERE `id`='".$ultimo['id']."';";
            $resultado = $conexion->mysqli->query($sql);
            $conexion->cerrar();
            return $resultado;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
    public function eliminarUltimo()
    {
        try
        {
            $ultimo = $this->obtenerUltimo();
            $conexion = new Conexion();
            if(!$conexion->conectar())
            {
                throw new Exception($conexion->getError());
            }
            $sql = "DELETE FROM `contacto` WHERE `id`='".$ultimo['id']."';";
            $resultado = $conexion->mysqli->query($sql);
            $conexion->cerrar();
            return $resultado;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}
 ?>