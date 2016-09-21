<?php
require_once '../../core/constants/constants_main.php';
require_once ROOT.'core/AbstractController.php';
require_once 'Model.php';
require_once 'View.php';

class Controller extends AbstractController{
    
    private $postData;

    private $fileData;
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
        $this->fileData = $this->helperFile();
        $this->model = $this->helperObjectModel();
        $this->view = $this->helperObjectView();
    }

    public function onEventHandler(){
        $this->loadAbsClass();
        $this->dictionaryViews = array();
        $event = $this->getEvent($this->dictionaryViews,MAIN_MODULE);
        $tmpl = call_user_func(get_class().'::'.$event);
        return $tmpl;
    }
    protected function index(){
        $data = array();
        $file = array();
        $html = $this->view->getView($data,$file);
        return $html;
    }

}