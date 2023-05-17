<?php
include 'Pasajeros.php';
class PasajeroNE extends Pasajeros{
    private $servicioEsp;
    public function __construct($pNombre,$pApellido,$pDni,$pTelefono,$pServiciosEsp){
        parent::__construct($pNombre,$pApellido,$pDni,$pTelefono);
        $this->serviciosEsp=$pServiciosEsp;
    }
    public function getServiciosEsp(){
        return $this->serviciosEsp;
    }
    public function setServiciosEsp($servicioEsp){
        $this->servicioEsp=$servicioEsp;
    }

}



?>