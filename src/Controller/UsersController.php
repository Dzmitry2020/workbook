<?php


namespace Controller;


use Core\Config;
use Model\UserModel;
use mysqli;
use View\View;

class UsersController extends AbstractTableController
{

    protected $tableName = "users";
    protected $templateFolder = "users";
    protected $table;

    public function __construct(View $view, mysqli $link)
    {
        parent::__construct($view, $link);
        $this->table = new UserModel(
            $this->tableName,
            $link
        );
    }

    public function actionShow(array $data)
    {
        parent::actionShow($data);
        $this->view->addData([
            'groupsList' => $this->table->getGroups(),
            'table' => $this
                ->table
                ->getUsers(
                    Config::PAGE_SIZE,
                    $data['get']['page'] ?? 1
                ),
            'fields' => array_diff($this->table->getColumnsNames(), ['id']),
            'comments' => $this->table->getColumnsComments()
        ]);
    }

    public function actionShowEdit(array $data)
    {
        parent::actionShowEdit($data);
        $this->view->addData([
            'groupsList' => $this->table->getGroups()
        ]);
    }

    public function actionAdd(array $data)
    {
        $data['post']['password'] = md5(md5($data['post']['password']) . Config::SALT);
        parent::actionAdd($data);
    }

    public function actionEdit(array $data)
    {
        $data['post']['password'] = md5(md5($data['post']['password']) . Config::SALT);
        parent::actionEdit($data);
    }

}