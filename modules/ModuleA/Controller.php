<?php
require_once('../../core/constants/ConstantsRootRuta.php');
require_once('Model.php');
require_once('View.php');

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
        $this->dictionaryViews = array();
        $event = $this->getEvent($this->dictionaryViews,MODULO_A);
        $tmpl = call_user_func($event);
        return $tmpl;
    }
    public function index(){
        $data = array('NAME'=>'MVC','TITEL'=>'N-FRAMEWORK');
        $html = $this->view->getView($data);
    }

}