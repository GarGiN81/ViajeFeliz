<?php
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPas;
    private $objColPasajeros;//referencia a objeto: pasajeros
    private $objResponsable; //referencia a objeto: responsableV

//metodo constructor
    public function __construct($cod,$dest,$cMax,$vObjPas,$vObjRes) {
        $this-> codigo = $cod;
        $this->destino=$dest;
        $this->cantMaxPas=$cMax;
        $this->objColPasajeros=$vObjPas;
        $this->objResponsable=$vObjRes;
    }
//METODOS DE ACCESO
//metodos get
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPas(){
        return $this->cantMaxPas;
    }
    public function getObjColPasajeros(){
        return $this->objColPasajeros;
    }
//metodos set
    public function setCodigo($codigo){
        $this->codigo=($codigo);
    }
    public function setDestino($destino){
        $this->destino=($destino);
    }
    public function setCantMaxPas($cantMaxPas){
        $this->cantMaxPas=$cantMaxPas;
    }
    public function setObjColPasajeros($objColPasajeros){
        $this->objColPasajeros=$objColPasajeros;
    }
//*********FUNCIONES PARA VER DATOS CARGADOS***********
/**
 * Funcion que muestra los datos de pasajeros cargados
 * 
 */
    
    /**
    * 
    */
    public function __toString() {
        $objPasajeros=$this->getObjColPasajeros();
        $cadena="";
        $cadena="
        Datos del viaje: \n
        Código: ".$this->getCodigo()."\n 
        Destino: ".$this->getDestino()."\n
        Cantidad Maxima de Pasajeros: ".$this->getCantMaxPas()."\n
        Pasajeros: ".$objPasajeros;
        return $cadena;
    }
//**********************FUNCIONES DE CARGA***********************
/**
 * 
 */
    public function buscarPasajero($dni){
        $objColPas=$this->getObjColPasajeros();
        $i=0;
        $encontro=false;
        while($i<count($objColPas)&&!$encontro){
            if ($objColPas[$i]['DNI']==$dni){
                $encontro=true;

            }
            $i++;
        }
        return $i-1;
}

public function encontroPasajero($buscaDni){
    $encontrado=false;
    $objColPas=$this->getObjColPasajeros();
    $indice=$this->buscarPasajero($buscaDni);
    if($indice>0 && $indice<(count($objColPas)-1)){
        $encontrado=true;
    }
    return $encontrado;
}

/**
 *Funcion para agregar pasajero
 *@param array $pasajeros ["Nombre"=>,"Apellido"=>"DNI"=>]
 *@return bool $puedeAgregar
*/
    public function agregarPasajero($dni,$nombre,$apellido,$telefono){
        $puedeAgregar=false;
        $objColPas=$this->getObjColPasajeros();
        if($this->puedeAbordar()==true){
            $objColPas[count($objColPas)]=['Nombre'=>$nombre, 'Apellido'=>$apellido, 'DNI'=>$dni, 'Telefono'=>$telefono];
            $this->setColeccionPasajeros($objColPas);
            $puedeAgregar=true;

        }
        return $puedeAgregar;

    }

/**
 * funcion que compara la cantidad disponible con los datos cargados     
*/
    public function puedeAbordar(){
        $aborda=false;
        $objColPas=$this->getObjColPasajeros();
        if($this->getCantMaxPas()>=count($objColPas)){
            $aborda=true;
        }
        return $aborda;
    }
/**
 *funcion que modfica un pasajero a partir de un dni buscado
 *  
 */
public function modificarPasajero($nombre,$apellido,$telefono,$buscarDni){
    $indice=$this->buscarPasajero($buscarDni);
    if($indice>0){
        $objColPas=$this->getObjColPasajeros();
        $objColPas[$indice]['Nombre']=$nombre;
        $objColPas[$indice]['Apellido']=$apellido;
        $objColPas[$indice]['Telefono']=$telefono;
        $this->setColeccionPasajeros($objColPas);
    }
    return $indice;

   }
   public function eliminarPasajero($dni){
    $esEliminado=false;
    $nombreE=null;
    $apellidoE=null;
    $dniE=null;
    $telefonoE=null;
    $objColPas=$this->getObjColPasajeros();
    $indice=$this->buscarPasajero($dni);
    if($indice>0){
        $objColPas[$indice]['Nombre']=$nombreE;
        $objColPas[$indice]['Apellido']=$apellidoE;
        $objColPas[$indice]['DNI']=$dniE;
        $objColPas[$indice]['Telefono']=$telefonoE;
        $this->setColeccionPasajeros($objColPas);
        $esEliminado=true;
    }
    return $esEliminado;
   }

}

?>