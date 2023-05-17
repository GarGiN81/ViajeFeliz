<?php
include 'Pasajeros.php';
class PasajeroVip extends Pasajeros{
    private $nroViajeroF;
    private $cantMillas;
    public function __construct($pNombre,$pApellido,$pDni,$pTelefono,$pNroViajeroF,$pCantMillas){
        parent::__construct($pNombre,$pApellido,$pDni,$pTelefono);
            $this->nroViajeroF=$pNroViajeroF;
            $this->cantMillas=$pCantMillas;
    }
    public function getNroViajeroF(){
        return $this->nroViajeroF;
    }
    public function getCantMillas(){
        return $this->cantMillas;
    }
    public function setNroViajeroF($nroViajeroF){
        $this->nroViajeroF=$nroViajeroF;
    }
    public function setCantMillas($cantMillas){
        $this->cantMillas=$cantMillas;
    }



}


?>