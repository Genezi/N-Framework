<?php
abstract  class AbstractController{


    abstract function onEventHandler();

    abstract function index();

    protected function helperData(){
        $datos['post'] = array();
        if(isset($_POST)){
            $datos['post'] = $_POST;
        }
        return $datos;
    }
    protected function helperFile(){
        $file['file'] = array();
        if($_FILES){
            $file['file'] = $_FILES;
        }
        return $file;
    }

    protected function getEvent($eventos,$modulo){
        $event = "index";
        $uri = $_SERVER['REQUEST_URI'];
        foreach ($eventos as $keyEvent => $evento){
            $uri_event = $modulo.$evento."/";
            if(strpos($uri,$uri_event) == True) $event = $keyEvent;
        }
        return $event;
    }
}