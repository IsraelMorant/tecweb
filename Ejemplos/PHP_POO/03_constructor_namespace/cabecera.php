<?php
namespace EJEMPLOS\POO;

class Cabecera {


    private $titulo;
    private $ubicacion;


    public function _construct($title,$location,$link){

        $this->titulo=$title;
        $this->ubicacion=$location;
        $this->enlace=$link;
    }


    public function graficar(){

        $estilo = 'font-size: 4px; text-align: '.$this->ubicacion;
        echo '<div style="'.$estilo.'">';
            echo '<h4>';
                echo '<a href="'.$this->enlace.'">'.$this->titulo.'</a>';
            echo'</h4>';
        echo '</div>';


    }

}
?>