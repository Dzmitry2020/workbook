<?php

namespace Controller;

use Model\CRUDInterface;
use View\View;
use Model\DbTable;
use mysqli;

abstract class AbstractTableController extends AbstractController
{
    protected $table; // CRUDInterface
    protected $view; // View
    protected $tableName;

    public function __construct(View $view, mysqli $mysqli)
    {
        $this->table = new DbTable(
            $mysqli,
            $this->tableName
        );

        $this->view = $view;
        $this->view->setTemplate('show');
    }

    public function actionShow()
    {
        // print_r($this->table->getComments());
        // $fields = $this->table->getFields();
        // unset($fields['id']);
        // echo $this->getClassName();
        $fields = array_diff($this->table->getFields(), ['id']);

        $this
            ->view
            ->setData([
                'table' => $this->table->get(),
                'fields' => $fields,
                'comments' => $this->table->getComments(),
                'type' => $this->getClassName()
            ])
            ->view();
//        echo $this->table
//            ->setSelect("id")
//            ->addSelect("adress")
//            ->setFrom("gb")
//            ->addFrom("phonebook")
//            ->setWhere("adress = 'Московский проспект'")
//            ->addWhere("name = 'Vasia'")
//            ->setGroupBy("name")
//            ->addGroupBy("lastname")
//            ->setHaving("sum(adress)>5")
//            ->addHaving("count(name) <80")
//            ->setOrderBy("id")
//            ->addOrderBy("name")
//            ->setLimit("5, 9")
//            ->getSql();
    }

    public function actionAdd(array $data)
    {
        // print_r($data);
        $this->table->add($data['post']);
        $this->redirect('?action=show&type=' . $this->getClassName());
    }

    public function actionDel(array $data)
    {

        // print_r($data);
        if (isset($data['get']['id'])) {
            $this->table->del($data['get']['id']);
        }
        $this->redirect('?action=show&type=' . $this->getClassName());
    }

    public function actionShowEdit(array $data)
    {
        // print_r($data['get']['id']);
        $id = $data['get']['id'];

        $viewData = $this->table->get($id)[0];

        unset($viewData['id']); // Del id

        $this
            ->view
            ->setTemplate('edit')
            ->setData([
                'fields' => $viewData,
                'id' => $id,
                'type' => $this->getClassName(),
                'comments' => $this->table->getComments()
            ])
            ->view();

        // print_r($viewData);
    }

    public function actionEdit(array $data)
    {
        // print_r($data);

        $editData = $data['post'];
        unset($editData['id']);

        // print_r($editData);

        $this->table->edit($data['post']['id'], $editData);
        $this->redirect('?action=show&type=' . $this->getClassName());
    }
}
