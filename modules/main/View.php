<?php

require_once ROOT.'core/AbstractView.php';

class View extends AbstractView{

    function __construct(){
        $this->setModule(MODULE_MAIN);
        $diccionario = array();
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