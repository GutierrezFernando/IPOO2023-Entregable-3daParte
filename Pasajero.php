<?php

class Pasajero{
  
    private $nombre;
    private $apellido;
    private $DNI;
    private $tipoDNI;

    public function __construct($nombre, $apellido, $DNI, $tipoDNI){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->DNI = $DNI;
        $this->tipoDNI = $tipoDNI;
    }

    // SETTERS
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setDNI($DNI){
        $this->DNI = $DNI;
    }
    public function setTipoDNI($tipoDNI){
        $this->tipoDNI = $tipoDNI;
    }

    // GETTERS
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDNI(){
        return $this->DNI;
    }
    public function getTipoDNI(){
        return $this->tipoDNI;
    }

    public function __toString(){
        
        return "\nNombre: " . $this->getNombre() . "\n".
               "Apellido: " . $this->getApellido() . "\n".
               "Documento: " . $this->getTipoDNI() . " " . $this->getDNI() . "\n";
    }

    public function darPorcentajeIncremento(){
        $porcIncremento = 10;
        return $porcIncremento;
    }
}

?>