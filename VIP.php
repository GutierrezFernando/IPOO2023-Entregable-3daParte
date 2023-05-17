<?php
include_once 'Pasajero.php';
class VIP extends Pasajero {
  
    private $nroViajeroFrec; // int
    private $cantMillas; // int
    
    public function __construct($nombre, $apellido, $DNI, $tipoDNI, $nroViajeroFrec, $cantMillas){
        parent::__construct($nombre, $apellido, $DNI, $tipoDNI);
        $this->nroViajeroFrec = $nroViajeroFrec;
        $this->cantMillas = $cantMillas;
    }

    // SETTERS
    public function setnroViajeroFrec($nroViajeroFrec){
        $this->nroViajeroFrec = $nroViajeroFrec;
    }
    public function setcantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }
    
    // GETTERS
    public function getnroViajeroFrec(){
        return $this->nroViajeroFrec;
    }
    public function getcantMillas(){
        return $this->cantMillas;
    }

    public function __toString(){
        return "\nPasajero VIP: \n" .
               parent::__toString(). 
               "Pasajero Frecuente N° : " . $this->getnroViajeroFrec().
               "Millas: " . $this->getcantMillas();
    }

    public function darPorcentajeIncremento(){
        $porcIncremento = parent::darPorcentajeIncremento();
        $porcIncremento  = 35;
        if($this->getcantMillas()>300){
            $porcIncremento = 30;
        }
        return $porcIncremento;
    }


}

?>