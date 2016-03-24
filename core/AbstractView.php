<?php
/**
 *
 * @author Andres Felipe Polo - <andresfpvclap@gmail.com>
 * @copyright 2016-2016 Genezi
 * @version 0.1.1
 *
 **/
class AbstractView{

    protected $diccionario = "";
    protected $modulo = "";

    protected function getTemplate($view){
        // REVISION
        $file = $_SERVER['DOCUMENT_ROOT'].RUTA."site_media/tmpl/".$this->modulo."/".$this->modulo.$view.".html";
        if($template = file_get_contents($file)) return $template;
        return "Error al cargar template";
    }
    protected function replacingData($tmpl,$data){
        foreach($data as $key => $value){
            $tmpl = str_replace('{'.$key.'}',$value,$tmpl);
        }
        return $tmpl;
    }

    protected function replacingFile($tmpl,$file){
        foreach ($file as $key => $value){
            $tmpl = str_replace('{'.$key.'}',$this->getTemplate($value),$tmpl);
        }
        return $tmpl;
    }
}