<?php

require_once ROOT.'core/AbstractView.php';

class View extends AbstractView{

    function __construct(){
        $this->setModule(MAIN_MODULE);
        $diccionario = array(
            'ACTIONS'=>array(),
            'URLS'=>array('RUTA'=>RUTA),
            'APP'=>array('TITLE'=>'N-Framework')

        );
        $this->setDiccionario($diccionario);
    }

    public function getView($data,$file){
        $html = $this->getTemplate('template');
        $html = $this->replacingData($html,$this->getDiccionario('APP'));
        $html = $this->replacingData($html,$this->getDiccionario('URLS'));
        $html = $this->replacingData($html,$data);
        $html = $this->replacingFile($html,$file);
        $html = $this->clearKeyWords($html);
        return $html;
    }

}