<?php

class Bootstrap
{
    private $request;
    private $controller;
    private $action;


    /*
        example shareboard.loc/user/register  where link structure is as follow
           {link root}/{controller}/{action}
    */
    public function __construct($request)
    {
        $this->request = $request;

        if ($this->request['controller'] == "") {
            $this->controller = "home";
        } else {
            $this->controller = $this->request['controller'];

        }

        if ($this->request['action'] == "") {
            $this->action = "index";
        } else {
            $this->action = $this->request['action'];
        }

    }

    public function createController()
    {
        //check fot the class
        if (class_exists($this->controller)) {
            $parent = class_parents($this->controller);

            //check if it is extended
            if (in_array("controller", $parent)) {
                if (method_exists($this->controller, $this->action)) {
                    //instantiate controller
                    return new $this->controller($this->action, $this->request);
                } else {
                    echo '<h1> method does not exist </h1>';
                    return;
                }
            } else {
                echo '<h1> controller does not exist </h1>';
                return;
            }
        } else {
            echo '<h1> class controller does not exist </h1>';
            return;
        }
    }

}