<?php

require_once ROOT.'core/AbstractView.php';

class View extends AbstractView{

    function __construct(){
        $this->setModule(NOMBRE_MODULE);
        $diccionario = array(
            'DATES'=>array(
                'TITLE'=>'N-FRAMEWORK',
                'H1'=>'MICRO-FRAMEWORK MVC PHP (N-GENEZI)'
            )
        );
        $this->setDiccionario($diccionario);
    }

    public function getView($data,$file){
        $html = $this->getTemplate('template');
        $html = $this->replacingData($html,$this->getDiccionario('DATES'));
        $html = $this->replacingData($html,$data);
        $html = $this->replacingFile($html,$file);
        return $html;
    }

}