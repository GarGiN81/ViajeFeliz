<?php
include "Viaje.php";
//MENU INICIAL
echo "Bienvenidx a Viaje Feliz, elija una opción: \n";
echo "Para comenzar, por favor ingrese los siguientes datos: \n";
echo "Ingrese código del viaje: ";
$cod=trim(fgets(STDIN));
echo "Ingrese destino del viaje: ";
$dest=trim(fgets(STDIN));
echo "Ingrese cantidad máxima de pasajeros que pueden abordar: ";
$cMax=trim(fgets(STDIN));

$objViaje=new Viaje($cod,$dest,$cMax);
$bandera=true;
do{
    echo menuOpciones();
    $opcion=trim(fgets(STDIN));
  
    switch($opcion){
        case '1':
            echo "El viaje actual posee el código: {$objViaje->getCodigo()}\n";
            echo "Ingrese un nuevo código: ";
            $cod=trim(fgets(STDIN));
            $objViaje->setCodigo($cod);
            break;
        case '2':
            echo "El viaje actual posee el siguiente destino: {$objViaje->getDestino()}\n";
            echo "Ingrese un nuevo destino: ";
            $dest=trim(fgets(STDIN));
            $objViaje->setDestino($dest);
            break;
        case '3':
            echo "El viaje posee: {$objViaje->getCantMaxPas()}\n";
            echo "Ingrese nueva cantidad máxima de pasajeros: ";
            $cMax=trim(fgets(STDIN));
            $objViaje->setCantMaxPas($cMax);
            break;
        case '4':
            if($objViaje->puedeAbordar()){
                echo "Ingrese los datos del pasajero: \n";
                $pasajero=datosPasajeros();
                if($objViaje->agregarPasajero($pasajero)){
                    echo "Pasajero agregado. \n";
                }else{
                    echo "No se pudo realizar la acción. El pasajero ya existe";
                }
            }else{
                echo "No se pudo agregar. Se ha alcanzado el límite de pasajeros..";
            } 
            break;
        case '5':
            echo "Ingrese el DNI del pasajero a quitar: \n";
            $dniP=trim(fgets(STDIN));
            if($objViaje->eliminarPasajero2($dniP)){
                echo "Pasajero eliminado.\n";
            }else{
                echo "El dato ingresado no existe.\n";
            }
            break;
        case '6':
            echo "Ingrese el DNI del pasajero que desea modificar: \n";
            $dniMod=trim(fgets(STDIN));
            $pasajeroAnt=array_keys($colPasajero,$dniMod);
            echo "Ingrese los datos nuevos del pasajero: \n";
            $pasajeroMod=datosPasajeros();
            if($objViaje->modificarPasajero($pasajeroAnt,$pasajeroMod)){
                echo "Los datos del pasajero se han actualizado";
            }else{
                echo "El dato ingresado es incorrecto";
            }
            break;
        case '7':
            echo $objViaje;
            break;
        default :
            $bandera=false;
            break;
    }

}while($bandera);





        




//menu de opciones
/**
 * 
 * 
 */
function menuOpciones(){
    return $menu = "Elija una opción:\n
    1. Modificar el código del viaje.\n
    2. Modificar el destino del viaje.\n
    3. Modificar la cantidad de pasajeros que pueden abordar.\n
    4. Agregar Pasajero. \n
    5. Quitar Pasajero. \n
    6. Modificar Pasajero. \n
    7. Ver viaje. \n
    8. Salir. \n";
}
//Función que recibe los datos de los pasajeros
/**
 * 
 * 
 */
function datosPasajeros(){
    echo "Nombre: \n";
    $nombre= strtoupper(trim(fgets(STDIN)));
    echo "Apellido: \n";
    $apellido=strtoupper(trim(fgets(STDIN)));
    echo "DNI: \n";
    $dni=intval(trim(fgets(STDIN)));
    $colPasV=["Nombre"=>$nombre, "Apellido"=>$apellido,"DNI"=>$dni];
    return $colPasV;
}



//lista precargada de 19 pasajeros
function cargarPasajeros(){
    $colPasajero=[];
    $colPasajero=["Nombre"=>"JOSE","Apellido"=>"SUAREZ","DNI"=>16111464];
    $colPasajero=["Nombre"=>"MARIA","Apellido"=>"MERINO","DNI"=>28122201];
    $colPasajero=["Nombre"=>"JUAN","Apellido"=>"SUAREZ","DNI"=>18222333];
    $colPasajero=["Nombre"=>"JOSE","Apellido"=>"GUTIERREZ","DNI"=>22122136];
    $colPasajero=["Nombre"=>"MARIO","Apellido"=>"VILLABLANCA","DNI"=>21145023];
    $colPasajero=["Nombre"=>"SEBASTIAN","Apellido"=>"SAN MARTIN","DNI"=>16455533];
    $colPasajero=["Nombre"=>"ROBERTO","Apellido"=>"LAVALLE","DNI"=>78563412];
    $colPasajero=["Nombre"=>"VIVIANA","Apellido"=>"GONZALEZ","DNI"=>98365787];
    $colPasajero=["Nombre"=>"ANTONELLA","Apellido"=>"MARIN","DNI"=>45365452];
    $colPasajero=["Nombre"=>"KEVIN","Apellido"=>"FIGUEROA","DNI"=>36452785];
    $colPasajero=["Nombre"=>"LISETH","Apellido"=>"PEREZ","DNI"=>36258963];
    $colPasajero=["Nombre"=>"LILA","Apellido"=>"SOTO","DNI"=>12457357];
    $colPasajero=["Nombre"=>"MAURICIO","Apellido"=>"MARTINEZ","DNI"=>85852741];
    $colPasajero=["Nombre"=>"FRANCO","Apellido"=>"LOPEZ","DNI"=>25654987];
    $colPasajero=["Nombre"=>"SEBASTIAN","Apellido"=>"GOMEZ","DNI"=>17565502];
    $colPasajero=["Nombre"=>"LUCAS","Apellido"=>"MONTIEL","DNI"=>20025520];
    $colPasajero=["Nombre"=>"CARINA","Apellido"=>"MOLINA","DNI"=>30457035];
    $colPasajero=["Nombre"=>"EVELIN","Apellido"=>"PAREDES","DNI"=>19378963];
    $colPasajero=["Nombre"=>"NATALIA","Apellido"=>"MARTINEZ","DNI"=>93025348];
    $colPasajero=["Nombre"=>"GONZALO","Apellido"=>"ARIAS","DNI"=>18552779];
    $colPasajero=[];
    return $colPasajero;
}

?>


