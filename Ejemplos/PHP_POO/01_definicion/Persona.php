<?php

class Persona{



    public function inicializar($name){


        $this->nombre=$name;

    }



    public function mostrar(){

        echo '<p>'.$this->nombre.'</p>';
    }
}

?>