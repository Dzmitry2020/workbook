<?php

namespace Core;

use Core\Config;
use Controller\TableController;
use Model\DbTable;
use mysqli;
use View\View;


class Dispatcher
{
    protected $mysqli;
    protected $view;
    protected $controllerName;
    protected $actionName;

    public function __construct()
    {
        $this->mysqli = new mysqli(
            Config::MYSQL_HOST,
            Config::MYSQL_USER_NAME,
            Config::MYSQL_PASSWORD,
            Config::MYSQL_DATABASE
        );

        $this->view = new View();
        $this->controllerName = "Controller\\" . (ucfirst(strtolower($_GET['type']?? 'Default')) ) . "Controller";
        $this->actionName = "action" . ($_GET['action'] ?? 'Default');
    }

    public function run()
    {
        $this->view->setLayout('mainLayout');

        $controller = new $this->controllerName(
            $this->view,
            $this->mysqli
        );

        //        $action = "action" . $_GET["action"];
        // echo $_SERVER['REQUEST_URI'];
        $controllerData = ['post' => $_POST, 'get' => $_GET];

        if (method_exists($controller, $this->actionName)) {
            $controller->{$this->actionName}($controllerData);
        } else {
            $controller->actionDefault();
        }
        // $controller->actionShow();
        // $controller->{"actionShow"}();
    }
}
