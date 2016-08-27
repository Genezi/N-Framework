<?php
/**
 *
 * @author Andres Felipe Polo - <andresfpvclap@gmail.com>
 * @copyright 2016-2016 Genezi
 * @version 0.1.1
 *
 **/
abstract class AbstractView{

    private $diccionario = array();
    private $modulo = "";

    abstract protected function getView($data,$file);

    protected function setModule($modulo){
        $this->modulo = str_replace("/","",$modulo);
    }
    
    protected function setDiccionario(array $diccionary){
        $this->diccionario = $diccionary;
    }
    
    protected function getDiccionario($keyDiccionary){
        return $this->diccionario[$keyDiccionary];
    }
    protected function getTemplate($view){
        $server = substr($_SERVER['DOCUMENT_ROOT'],0);
        $file = $server.RUTA."site_media/tmpl/".$this->modulo."/".$this->modulo."_".$view.".html";
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