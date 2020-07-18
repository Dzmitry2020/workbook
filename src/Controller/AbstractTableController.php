<?php

namespace Controller;

use Core\Config;
use TexLab\MyDB\DbEntity;
use View\View;
use mysqli;

abstract class AbstractTableController extends AbstractController
{
    protected $table; // CRUDInterface
    protected $view; // View
    protected $tableName;
    protected $templateFolder;

    public function __construct(View $view, mysqli $link)
    {
        $this->table = new DbEntity(
            $this->tableName,
            $link
        );

        parent::__construct($view);
        $this->view->setFolder($this->templateFolder);
    }

    public function actionShow(array $data)
    {
        $this
            ->view
            ->setTemplate('show')
            ->setData([
                'table' => $this
                    ->table
                    ->setPageSize(Config::PAGE_SIZE)
                    ->getPage($data['get']['page'] ?? 1),
                'fields' => array_diff($this->table->getColumnsNames(), ['id']),
                'comments' => $this->table->getColumnsComments(),
//                'columnsTypes' => $this->table->getColumnsTypes(),
                'type' => $this->getClassName(),
                'pageCount' => $this->table->PageCount()
            ]);
    }

    public function actionAdd(array $data)
    {
        $this->table->add($data['post']);
        $this->redirect('?action=show&type=' . $this->getClassName());
    }

    public function actionDel(array $data)
    {
        if (isset($data['get']['id'])) {
            $id = $data['get']['id'];
            $this->table->del(['id' => $id]);;
        }
        $this->redirect('?action=show&type=' . $this->getClassName());
    }

    public function actionShowEdit(array $data)
    {
        $id = $data['get']['id'];

        $viewData = $this->table->get(['id' => $id])[0];

        unset($viewData['id']); // Del id

        $this
            ->view
            ->setTemplate('edit')
            ->setData([
                'fields' => $viewData,
                'id' => $id,
                'type' => $this->getClassName(),
                'comments' => $this->table->getColumnsComments()
            ]);
    }

    public function actionEdit(array $data)
    {
        $editData = $data['post'];
        unset($editData['id']);

        $this->table->edit(['id' => $data['post']['id']], $editData);
        $this->redirect('?action=show&type=' . $this->getClassName());
    }
}
