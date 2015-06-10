<?php

/**
 *
 * @Clase para modificar beneficiario. "beneficiario.php"
 * @versión: 0.1      @modificado:   8 de junio de 2015
 * @autor: TRM
 *
 */
class beneficiario
{

    private $idBeneficiario;
    private $nombre;
    private $curp;
    private $rfc;
    private $estatus;
    private $motivo;

    public function __construct(){

    }
    public function setidBeneficiario($idBeneficiario){
        $this->idBeneficiario = $idBeneficiario;
    }
    
    public function getidBeneficiario(){
        return $this->idBeneficiario;
    }

    public function setnombre($nombre){
        $this->nombre = $nombre;
    }

    public function getnombre(){
        return $this->nombre;
    }

    public function setrfc($rfc){
        $this->rfc = $rfc;
    }
    
    public function getrfc(){
        return $this->rfc;
    }
    
    public function setcurp($curp){
        $this->curp = $curp;
    }
    
    public function getcurp(){
        return $this->curp;
    }
    
    public function setEstatus($estatus){
        $this->estatus = $estatus;
    }
    
    public function getEstatus(){
        return $this->estatus;
    }
    
    public function setMotivo($motivo){
        $this->motivo = $motivo;
    }
    
    public function getMotivo(){
        return $this->motivo;
    }
}

?>
