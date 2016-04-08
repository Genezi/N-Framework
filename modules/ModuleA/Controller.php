<?php

require_once '../../core/constants/ConstantsModuleA.php';
require_once(ROOT.'core/AbstractController.php');
require_once 'Model.php';
require_once 'View.php';

class ControllerModuleA extends AbstractController{
    
    private $postData;

    private $file;
    /** **/
    private $view;

    private $model;

    private $dictionaryViews;

    private function helperObjectModel(){
        $model = new ModelModuleA();
        return $model;
    }

    private function  helperObjectView(){
        $view = new ViewModuleA();
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
        $this->dictionaryViews = array(VIEW_CONTACTO=>'contacto');
        $event = $this->getEvent($this->dictionaryViews,MODULO_A);
        $tmpl = call_user_func('ControllerModuleA::'.$event);
        return $tmpl;
    }
    public function index(){
        $data = array('NAME'=>'MVC','POLO'=>'N-FRAMEWORK');
        $file = array('HEADER_FILE'=>'header');
        $html = $this->view->getView($data,$file);
        return $html;
    }

    public function contacto(){
        $data = array('NAME'=>'MVC','POLO'=>'N-FRAMEWORK');
        $file = array('HEADER_FILE'=>'contacto');
        $html = $this->view->getView($data,$file);
        return $html;
    }

}