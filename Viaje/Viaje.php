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
//Funciones de carga
/**
 *Funcion para agregar pasajero
 *@param array $pasajeros ["Nombre"=>,"Apellido"=>"DNI"=>]
 *@return bool $puedeAgregar
*/

    public function agregarPasajero($pasajeros){
        $puedeAgregar=false;
        $arrayPasajeros=$this->getColeccionPasajeros();
        if(in_array($pasajeros, $this->getColeccionPasajeros())){
            $puedeAgregar=false;
        }else{
            array_push($arrayPasajeros,$pasajeros);
            $this->setColeccionPasajeros($arrayPasajeros);
            $puedeAgregar=true;

            }
            return $puedeAgregar;

    }
    /**public function agregarPasajero($claveDni){
        //foreach($this->getColeccionPasajeros() as $key =>$clave){}
        $clave=array_search(array_keys($claveDni),$this->getColeccionPasajeros());
    }*/

    //funcion que compara la cantidad disponible con los datos cargados
        public function puedeAbordar(){
            $aborda=true;
            $totalPasajero=($this->getColeccionPasajeros().ob_get_length());
            if($this->getCantMaxPas()<=$totalPasajero){
                $aborda=false;
            }
            return $aborda;
        }



        //funcion que elimina o quita un pasajero
       /**public function eliminarPasajero($pasajero){
        $esEliminado=false;
        if(in_array($pasajero,$this->getColeccionPasajeros())){
            $clave=array_search(array_keys($pasajero),$this->getColeccionPasajeros());
            array_splice($this->getColeccionPasajeros(),$clave,1);
            $this->setColeccionPasajeros($this->getColeccionPasajeros());
            $esEliminado= true;
        }
        return $esEliminado;
       }*/

       public function eliminarPasajero2($dniP){
        $nroColeccion=0;
        $esEliminado=false;
        $cantPasajeros=count($this->getColeccionPasajeros());
        while($nroColeccion <= $cantPasajeros && $esEliminado==false){
            if($this->getColeccionPasajeros()["DNI"]==$dniP){
                $clave=array_search($dniP,$this->getColeccionPasajeros());
                array_splice($this->getColeccionPasajeros(),$clave,1);
                $this->setColeccionPasajeros($this->getColeccionPasajeros());
                $esEliminado=true;
            }
            return $esEliminado;

        }


       }
/**
 *
 *  
 */
       public function modificarPasajero($pasajeroAnt, $pasajeroMod){
        $esModificado=false;
        if(in_array($pasajeroAnt,$this->getColeccionPasajeros())){
            $clave=array_search(array_keys($pasajeroAnt),$this->getCantMaxPas());
            $this->getColeccionPasajeros()[$clave]=$pasajeroMod;
            $this->setColeccionPasajeros($this->getColeccionPasajeros());
            $esModificado=true;
        }
        return $esModificado;

       }
       /**
        * 

        */
       public function colPasString(){
        $pasajeroStr="";
        $colPas=$this->getColeccionPasajeros();
        foreach($colPas as $key =>$clave){
            $nombre=$clave["Nombre"];
            $apellido=$clave["Apellido"];
            $dni=$clave["DNI"];
            $pasajeroStr="
            Nombre: $nombre.\n
            Apellido: $apellido.\n
            DNI: $dni \n";
        }
        return $pasajeroStr;
       }
       public function __toString() {

        $pasajeros=$this->colPasString();
        $cadena="
        Datos del viaje: \n
        Código: {$this->getCodigo()}.\n
        Destino: {$this->getDestino()}.\n
        Cantidad Máxima de Pasajeros: {$this->getCantMaxPas()}.\n
        Datos de los Pasajeros: \n
        $pasajeros";
        return $cadena;
        }
    }
?>