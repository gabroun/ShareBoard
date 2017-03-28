<?php

class Bootstrap {
    private $request;
    private $controller;
    private $action;

    public function __construct($request)
    {
        $this->request = $request;

        if($this->request['controller'] == ""){
            $this->controller= "home";
        }
    }
}