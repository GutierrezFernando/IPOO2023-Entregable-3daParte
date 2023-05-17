<?php

include_once ('Viaje.php');
include_once ('Pasajero.php');
include_once ('VIP.php');
include_once ('NecesidadesEsp.php');
include_once ('ResponsableV.php');

$ColPasajeros = [];
$ColPasajeros[0] = new Pasajero ("Carlos", "Hernandez", 11111111, "DNI");
$ColPasajeros[1] = new VIP ("Maria", "Juarez", 22222222, "LE", 3456, 299);
$ColPasajeros[2] = new NecesidadesEsp ("Juan", "Perez", 33333333, "LC", true, true, "VEGANO");

$Responsable= [];
$Responsable[0] = new ResponsableV("Mariana", "Meriño", 1234, 4321);

$Viaje = new Viaje(1, "Iguazu", 5, $ColPasajeros, $Responsable, 100, 370);

echo "*****************************************\n";
echo "1. Cargar viaje \n".
     "2. Cargar pasajero \n".
     "3. Editar pasajero \n".
     "4. Cargar un Responsable \n";
echo "*****************************************";
echo "\nIngrese la opcion que desea realizar: \n";
$i = trim(fgets(STDIN)) ;

switch ($i){
    case 1:
        // cargar viaje
        cargaViaje($Viaje);
        echo $Viaje;
        break;
    case 2:
        // cargo nuevo pasajero
        cargarPasajero($Viaje);
        echo $Viaje;
        break;
    case 3:
        // edito un pasajero
        //editarPasajero($Viaje);
        echo $Viaje;
        break;
    case 4:
        //cargo un responsable
        registrarResponsable($Viaje);
        echo $Viaje;
        break;
}

/** MODULO DE CARGA DE VIAJE
 */
 function cargaViaje($Viaje){
    echo "Ingrese codigo del viaje\n";
    $codigo = trim(fgets(STDIN));
    $Viaje->setCodigo($codigo);
    echo "Ingrese destino del viaje: \n";
    $destino = trim(fgets(STDIN));
    $Viaje->setDestino($destino);
    echo "Ingrese cantidad maxima de pasajeros en el viaje\n";
    $cantMaxPasajeros = trim(fgets(STDIN));
    $Viaje->setCantMaxPasajeros($cantMaxPasajeros);
    echo "Ingrese que desea realizar: \n". 
    "1. Editar datos de los pasajeros \n".
    "2. Borrar Listado de Pasajeros \n". 
    "3. Finalizar carga de datos \n";
    $rta = trim(fgets(STDIN));

    if ($rta == 1){
        cargarPasajero($Viaje);
        echo "Carga de pasajero finalizada\n";   
    } elseif($rta == 2){
        $arrayPasajeros = [];
        $Viaje->setListaPasajeros($arrayPasajeros);
        echo "Carga de pasajero finalizada\n";
    }else {
        echo "Carga de pasajero finalizada\n";
    }

    echo "Ingrese que desea realizar: \n". 
    "1. Editar datos de los responsables \n".
    "2. Borrar Listado de responsables \n". 
    "3. Finalizar carga de datos \n";
    $rta = trim(fgets(STDIN));

    if ($rta == 1){
        registrarResponsable($Viaje);
        echo "Carga de responsable finalizada";   
    } elseif($rta == 2){
        $arrayResponsables = [];
        $Viaje->setobjResponsable($arrayResponsables);
        echo "Carga de responsable finalizada";
    }else {
        echo "Carga de responsable finalizada";
    }
    
    echo $Viaje;
 }
  
/** FUNCION QUE CARGA PASAJERO NUEVO AL LISTADO*/
    function cargarPasajero($Viaje){
        echo "Ingrese el nombre de pasajero: ";
        $pNombre = trim(fgets(STDIN));
        echo "Ingrese el apellido de pasajero: ";
        $pApellido = trim(fgets(STDIN));
        echo "Ingrese el dni: ";
        $pDni = trim(fgets(STDIN));
        echo "Ingrese el tipo de dni: ";
        $pTipoDni = trim(fgets(STDIN));
        echo "1-Pasajero Regular\n
              2-Pasajero VIP\n
              3-Pasajero c/Necesidades Especiales\n
              Seleccione Opcion: ";
        $rta = trim(fgets(STDIN));

        if($rta == 1){
            $pasajero = new Pasajero ($pNombre, $pApellido, $pDni, $pTipoDni);
        } elseif ($rta == 2) {
            echo "Ingrese nro de viajero frecuente: ";
            $nroVFrec = trim(fgets(STDIN));
            echo "Ingrese cantidad de Millas: ";
            $millas = trim(fgets(STDIN));
            $pasajero = new VIP ($pNombre, $pApellido, $pDni, $pTipoDni, $nroVFrec, $millas);
        } elseif ($rta == 3) {
            $silla = false;
            $asist = false;
            $comida = "";
            echo "El pasajero utiliza silla de ruedas?: ";
            $rtaSilla = trim(fgets(STDIN));
            if($rtaSilla == "S"){
                $silla = true;
            }

            echo "El pasajero necesita asistencia?: ";
            $rtaAsist = trim(fgets(STDIN));
            if($rtaAsist == "S"){
                $asist = true;
            }

            echo "El pasajero consume menu especial?: ";
            $rtaMenu = trim(fgets(STDIN));
            if($rtaMenu == "S"){
                echo "Ingrese que menu solicita el pasajero: ";
                $comida = trim(fgets(STDIN));
            }

            $pasajero = new NecesidadesEsp ($pNombre, $pApellido, $pDni, $pTipoDni, $silla, $asist, $comida);
        } else{
            echo "El numero ingresado no se encuentra definido";
        }
        
        $Viaje->registrarPasajero($pasajero);
    }

/** FUNCION QUE CARGA RESPONSABLE NUEVO AL LISTADO*/
function registrarResponsable($Viaje){
    echo $Viaje->hacerListaResponsables();
    echo "Ingrese el nombre del responsable: ";
    $pNombre = trim(fgets(STDIN));
    echo "Ingrese el apellido del responsable: ";
    $pApellido = trim(fgets(STDIN));
    echo "Ingrese el numero de licencia: ";
    $pnumLic = trim(fgets(STDIN));
    echo "Ingrese el numero de empleado: ";
    $pnumEmp = trim(fgets(STDIN));

    $nuevoResponsable = new ResponsableV ($pNombre, $pApellido, $pnumLic, $pnumEmp);
    
    $Viaje->registrarResponsable($nuevoResponsable);
    }

?>