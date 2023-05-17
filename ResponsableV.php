<?php

class ResponsableV{

    // Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
    
    private $nombre;
    private $apellido;
    private $numLicencia;
    private $numEmpleado;

    public function __construct($nombre, $apellido, $numLicencia, $numEmpleado){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numLicencia = $numLicencia;
        $this->numEmpleado = $numEmpleado;
    }

    // SETTERS
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setnumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }
    public function setnumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }

    // GETTERS
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getnumLicencia(){
        return $this->numLicencia;
    }
    public function getnumEmpleado(){
        return $this->numEmpleado;
    }

    public function __toString(){
        
        return 
                "\nNumero de Empleado: " . $this->getnumEmpleado() . "\n".
                "Numero de Licencia: " . $this->getnumLicencia() ."\n".
                "Nombre: " . $this->getNombre() . "\n".
                "Apellido: " . $this->getApellido() . "\n";
    }

}

?>