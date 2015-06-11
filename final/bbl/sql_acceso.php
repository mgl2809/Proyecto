<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
require_once('../../dao/conexion.php');
require_once('../../dao/cacceso.php');

class sql_acceso {

    public function __construct() {
        
    }

    public function ValidaAcceso($usuario, $pass) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $usuarios_admin = $Conexion->ejecutar("select idusuario, alias, contrasena, nombre 
                         from usuario inner join administrador on usuario.idusuario=administrador.usuario_idusuario 
						 where alias='" . $usuario . "' AND contrasena=MD5('" . $pass . "');");


        if ($admin = mysql_fetch_array($usuarios_admin)) { //Es un alumno
            $emp = new Cacceso($admin['idusuario'], $admin['nombre'], "admin");
        } else {
            $emp = new Cacceso(null, null, null);
        }
        $Conexion->desconectarse();
        return $emp;
    }

}

?>
