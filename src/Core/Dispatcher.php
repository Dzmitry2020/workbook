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
        $this->controllerName = "Controller\\" . (ucfirst(strtolower($_GET['type'] ?? 'login'))) . "Controller";
//        $this->actionName = "action" . ($_GET['action'] ?? 'Default');
        $this->actionName = "action" . ($_GET['action'] ?? 'loginform');
    }

    public function run()
    {
        $blacklist = include "blacklist.php";
        $cod = $_SESSION['user']['cod'] ?? 'guest';

        if ($this->actionName == 'loginform') {
            $this->view->setLayout('plainLayout');
        } else $this->view->setLayout('mainLayout');

        if (!(in_array($_GET['type'], $blacklist[$cod]))) {

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
        } else {
            header("HTTP/1.0 403 Forbidden");
        }
    }
}
