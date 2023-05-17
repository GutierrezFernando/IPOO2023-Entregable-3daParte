<?php
include_once 'Pasajero.php';
class NecesidadesEsp extends Pasajero {
    private $sillaDeRuedas; // boolean
    private $asistEmbDesemb; // boolean
    private $comidaEspecial; // string

    public function __construct($nombre, $apellido, $DNI, $tipoDNI, $sillaDeRuedas, $asistEmbDesemb, $comidaEspecial){
        parent::__construct($nombre, $apellido, $DNI, $tipoDNI);
        $this->sillaDeRuedas = $sillaDeRuedas;
        $this->asistEmbDesemb = $asistEmbDesemb;
        $this->comidaEspecial = $comidaEspecial;
    }

    // SETTERS
    public function setsillaDeRuedas($sillaDeRuedas){
        $this->sillaDeRuedas = $sillaDeRuedas;
    }
    public function setasistEmbDesemb($asistEmbDesemb){
        $this->asistEmbDesemb = $asistEmbDesemb;
    }
    public function setcomidaEspecial($comidaEspecial){
        $this->comidaEspecial = $comidaEspecial;
    }

    // GETTERS
    public function getsillaDeRuedas(){
        return $this->sillaDeRuedas;
    }
    public function getasistEmbDesemb(){
        return $this->asistEmbDesemb;
    }
    public function getcomidaEspecial(){
        return $this->comidaEspecial;
    }

    public function __toString(){
        return "\n Utiliza Silla de Ruedas: " . $this->getsillaDeRuedas() . "\n".
               "Asistencia Embarque/Desembarque: " . $this->getasistEmbDesemb() . "\n".
               "Comida Especial: " . $this->getcomidaEspecial();
    }


    public function darPorcentajeIncremento(){
        $porcIncremento = parent::darPorcentajeIncremento();

        //funcion que cambia a $comidaEspecial a true si hay cargado un string dentro de $this->getcomidaEspecial
        $comidaEspecial = false;
        if(strlen(trim($this->getcomidaEspecial())) > 0){
            $comidaEspecial = true;
        }

        // creo if para ir contando la cantidad de necesidades del pasajero
        $contadorIncremento = 0;
        if($this->getsillaDeRuedas()){
            $contadorIncremento++;
        }
        if($this->getasistEmbDesemb()){
            $contadorIncremento++;
        }
        if($comidaEspecial){
            $contadorIncremento++;
        }

        // Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje
        // tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%
        //en base al contador de necesidades actualizo el porcIncremento

        if($contadorIncremento = 1){
            $porcIncremento = 15;
        } else{
            $porcIncremento = 30;
        }

        return $porcIncremento;
    }
}

?>