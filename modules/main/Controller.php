<?php

require_once '../../core/constants/constans_nombre_module.php';
require_once(ROOT.'core/AbstractController.php');
require_once 'Model.php';
require_once 'View.php';

class Controller extends AbstractController{
    
    private $postData;

    private $file;
    /** **/
    private $view;

    private $model;

    private $dictionaryViews;

    private function helperObjectModel(){
        $model = new Model();
        return $model;
    }

    private function  helperObjectView(){
        $view = new View();
        return $view;
    }

    public function loadAbsClass(){
        $this->postData = $this->helperData();
        $this->file = $this->helperFile();
        $this->model = $this->helperObjectModel();
        $this->view = $this->helperObjectView();
    }

    public function onEventHandler(){
        $this->loadAbsClass();
        $this->dictionaryViews = array(/*Lista de vistas definidas en constantes dl modulo*/);
        $event = $this->getEvent($this->dictionaryViews,NOMBRE_MODULE);
        $tmpl = call_user_func(get_class().'::'.$event);
        return $tmpl;
    }
    public function index(){
        $data = array('NAME'=>'MVC','POLO'=>'N-FRAMEWORK');
        $file = array();
        $html = $this->view->getView($data,$file);
        return $html;
    }
    

}