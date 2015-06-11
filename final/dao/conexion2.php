<?php

/**
 *
 * @Clase de conexion, consulta y actualización en la base de datos. "conexion.php"
 * @versión: 0.1      @modificado: 28 de Junio del 2010
 * @autor: DAS
 *
 */
class Conexion {

    var $servidor;
    var $usuario;
    var $password;
    var $base_datos;
    var $conexion;

    function Conexion($server, $user, $pass, $bd) {
        $this->servidor = $server;
        $this->usuario = $user;
        $this->password = $pass;
        $this->base_datos = $bd;
    }

    function conectarse() {
        $this->conexion = mysql_connect($this->servidor, $this->usuario, $this->password);
        if (!($this->conexion)) {
            echo "<br/>ERROR - No se puede conectar el servidor <b>" . $this->servidor . "</b>, verifique el nombre del servidor, usuario y contraseña<br/>";
            return false;
        } elseif (!mysql_select_db($this->base_datos, $this->conexion)) {
            echo "<br/>ERROR - La base de datos <b>" . $this->base_datos . "</b> no existe en el servidor <b>" . $this->servidor . "</b>";
            return false;
        }
        else
            return true;
    }

    function ejecutar($sql_query) {
        $resultado = mysql_query($sql_query, $this->conexion)
                or die("<br/>ERROR al ejecutar <b>" . $sql_query . "</b> debido a: " . mysql_error());
        return $resultado;
    }

    function desconectarse() {
        //liberar conexion
        mysql_close($this->conexion);
    }

}

function conectar_bd() {
    $m_conexion = new Conexion("localhost", "root", "root", "bdscb");
    return $m_conexion;
}

?>
