<?php

namespace Controller;

use Core\Config;
use Model\LoginModel;
use mysqli;
use View\View;

class LoginController extends AbstractController
{
    private LoginModel $table;

    public function __construct(View $view, mysqli $link)
    {
        parent::__construct($view);
        $this->table = new LoginModel(
            $link
        );
    }

    public function actionLoginForm()
    {
        $this
            ->view
            ->setFolder('login')
            ->setTemplate('loginform')
            ->setLayout("plainLayout")
            ->setData(['action' => '?action=login&type=' . $this->getClassName()]);
    }

    public function actionLogin($controllerData)
    {
        $user = $this
            ->table
            ->checkUser(
                $controllerData['post']['login'],
                md5(md5($controllerData['post']['pass']) . Config::SALT)
            );

        if (!empty($user)) {
            $_SESSION['user'] = $user;
            switch ($user['cod']) {
                case 'admin': case 'user':
                    $location = '?action=show&type=tasks';
                    break;
                case 'disp':
                    $location = '?action=views&type=trips';
                    break;
                case 'guest':
                    $location = '?action=views&type=tasks';
                    break;
                default:
//                    $location = '?action=default&type=default';
                    $location = '/';
            }
        } else {
            $location = '/';
        }
        $this->redirect($location);
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        $this->redirect('/');
    }
}
