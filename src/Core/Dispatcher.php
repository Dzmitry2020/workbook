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


        $this->controllerName = "Controller\\" . (ucfirst(strtolower($_GET['type'] ?? 'login'))) . "Controller";
        $this->actionName = "action" . ($_GET['action'] ?? 'loginform');
        //$this->actionName = "action" . ($_GET['action'] ?? 'Default');
    }

    public function run()
    {
        $blacklist = include "blacklist.php";
        $cod = $_SESSION['user']['cod'] ?? 'user';

        if (!(in_array($_GET['type'], $blacklist[$cod]))) {
            if (class_exists($this->controllerName)) {
                $this->view = new View();
                $controller = new $this->controllerName(
                    $this->view,
                    $this->link
                );
                $controllerData = ['post' => $_POST, 'get' => $_GET];

                if (method_exists($controller, $this->actionName)) {
                    if ($this->actionName == 'loginform') {
                        $this->view->setLayout('plainLayout');
                    } else {
                        $this->view->setLayout('mainLayout');
                    }
                    $controller->{$this->actionName}($controllerData);
                    $this
                        ->view
                        ->addData(['controllerType' => $_GET['type']])
                        ->view();
                } else {
                    header("Location: 404.html");
                }
            } else {
                header("Location: 404.html");
            }
        } else {
//            header("HTTP/1.0 403 Forbidden");
            header("Location: 403.html");
        }
    }
}
