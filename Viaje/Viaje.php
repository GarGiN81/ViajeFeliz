<?php
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPas;
    private $coleccionPasajeros;//[dni=> ,nombre=>" ",apellido=>" "]

//metodo constructor
    public function __construct($cod,$dest,$cMax) {
        $this-> codigo = $cod;
        $this->destino=$dest;
        $this->cantMaxPas=$cMax;
        $this->coleccionPasajeros=[];
  

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
    public function getColeccionPasajeros(){
        return $this->coleccionPasajeros;
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
    public function setColeccionPasajeros($coleccionPasajeros){
        $this->coleccionPasajeros=$coleccionPasajeros;
    }
//*********FUNCIONES PARA VER DATOS CARGADOS***********
/**
 * Funcion que muestra los datos de pasajeros cargados
 * 
 */
    public function mostrarDatosPasajero(){
        $cadena="";
        $i=0;
        $colPas=$this->getColeccionPasajeros();
        for($i=0;$i<count($colPas);$i++){
            $nombre=$colPas[$i]["Nombre"];
            $apellido=$colPas[$i]["Apellido"];
            $dni=$colPas[$i]["DNI"];
            $cadena=$cadena."
            Pasajero: ".$i."\n 
            Nombre: ".$nombre."\n
            Apellido: ". $apellido."\n 
            DNI: ".$dni."\n";
        }
        return $cadena;
       }
    /**
    * 
    */
    public function __toString() {
        $cadena="";
        $cadena="
        Datos del viaje: \n
        Código: ".$this->getCodigo()."\n 
        Destino: ".$this->getDestino()."\n
        Cantidad Maxima de Pasajeros: ".$this->getCantMaxPas()."\n
        Pasajeros: ".$this->mostrarDatosPasajero();
        return $cadena;
    }
//**********************FUNCIONES DE CARGA***********************
/**
 * 
 */
    public function buscarPasajero($dni){
        $colPas=$this->getColeccionPasajeros();
        $i=0;
        $encontro=false;
        while($i<count($colPas)&&!$encontro){
            if ($colPas[$i]['DNI']==$dni){
                $encontro=true;

            }
            $i++;
        }
        return $i-1;
}

public function encontroPasajero($buscaDni){
    $encontrado=false;
    $colPas=$this->getColeccionPasajeros();
    $indice=$this->buscarPasajero($buscaDni);
    if($indice>0 && $indice<(count($colPas)-1)){
        $encontrado=true;
    }
    return $encontrado;
}

/**
 *Funcion para agregar pasajero
 *@param array $pasajeros ["Nombre"=>,"Apellido"=>"DNI"=>]
 *@return bool $puedeAgregar
*/
    public function agregarPasajero($dni,$nombre,$apellido){
        $puedeAgregar=false;
        $colPas=$this->getColeccionPasajeros();
        if($this->puedeAbordar()==true){
            $colPas[count($colPas)]=['Nombre'=>$nombre, 'Apellido'=>$apellido, 'DNI'=>$dni];
            $this->setColeccionPasajeros($colPas);
            $puedeAgregar=true;

        }
        return $puedeAgregar;

    }

/**
 * funcion que compara la cantidad disponible con los datos cargados     
*/
    public function puedeAbordar(){
        $aborda=false;
        $colPas=$this->getColeccionPasajeros();
        if($this->getCantMaxPas()>=count($colPas)){
            $aborda=true;
        }
        return $aborda;
    }
/**
 *funcion que modfica un pasajero a partir de un dni buscado
 *  
 */
public function modificarPasajero($dni,$nombre,$apellido,$buscarDni){
    $indice=$this->buscarPasajero($buscarDni);
    if($indice>0){
        $colPas=$this->getColeccionPasajeros();
        $colPas[$indice]['Nombre']=$nombre;
        $colPas[$indice]['Apellido']=$apellido;
        $colPas[$indice]['DNI']=$dni;
        $this->setColeccionPasajeros($colPas);
    }
    return $indice;

   }
   public function eliminarPasajero($dni){
    $esEliminado=false;
    $nombreE=null;
    $apellidoE=null;
    $dniE=null;
    $colPas=$this->getColeccionPasajeros();
    $indice=$this->buscarPasajero($dni);
    if($indice>0){
        $colPas[$indice]['Nombre']=$nombreE;
        $colPas[$indice]['Apellido']=$apellidoE;
        $colPas[$indice]['DNI']=$dniE;
        $this->setColeccionPasajeros($colPas);
        $esEliminado=true;
    }
    return $esEliminado;
   }

}

?>