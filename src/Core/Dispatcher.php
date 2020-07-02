<?php

namespace Core;

use TexLab\MyDB\DB;
use View\View;

class Dispatcher
{
    protected $view;
    protected $controllerName;
    protected $actionName;
    protected $link;

    public function __construct()
    {
        $this->link = DB::Link([
            'host' => Config::MYSQL_HOST,
            'username' => Config::MYSQL_USER_NAME,
            'password' => Config::MYSQL_PASSWORD,
            'dbname' => Config::MYSQL_DATABASE
        ]);

        $this->view = new View();
        $this->controllerName = "Controller\\" . (ucfirst(strtolower($_GET['type'] ?? 'Default'))) . "Controller";
        $this->actionName = "action" . ($_GET['action'] ?? 'Default');
    }

    public function run()
    {
        $this->view->setLayout('mainLayout');

        if (class_exists($this->controllerName)) {
            $controller = new $this->controllerName(
                $this->view,
                $this->link
            );
            $controllerData = ['post' => $_POST, 'get' => $_GET];

            if (method_exists($controller, $this->actionName)) {
                $controller->{$this->actionName}($controllerData);
                $this
                    ->view
                    ->addData(['controllerType' => $_GET['type']])
                    ->view();
            } else {
                header("HTTP/1.0 404 Not Found");
            }

        } else {
            header("HTTP/1.0 404 Not Found");
        }
    }
}
