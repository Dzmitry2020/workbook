<?php

namespace Controller;

use Core\Config;
use TexLab\MyDB\DbEntity;
use View\View;
use mysqli;

/** @var int $pageCount */
abstract class AbstractTableController extends AbstractController
{
    protected DbEntity $table; // CRUDInterface
    protected View $view; // View
    protected string $tableName;
    protected string $templateFolder;

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
                'type' => $this->getClassName(),
                'pageCount' => $this->table->PageCount(),
                'currentPage' => ($data['get']['page'] ?? 1)
            ]);
    }

    public function actionAdd(array $data)
    {
        $this->table->add($data['post']);

        $this->redirect(
            '?action=show&type=' . $this->getClassName()
            . "&page="
            . $this->table->setPageSize(Config::PAGE_SIZE)->pageCount()
        );
    }

    public function actionDel(array $data)
    {
        if (isset($data['get']['id'])) {
            $id = $data['get']['id'];
            $this->table->del(['id' => $id]);
        }
        if (isset($data['get']['page'])) {
            $page = min(
                $this->table->setPageSize(Config::PAGE_SIZE)->pageCount(),
                $data['get']['page']
            );
        } else {
            $page = 1;
        }
        $this->redirect('?action=show&type=' . $this->getClassName() . "&page=$page");
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
                'comments' => $this->table->getColumnsComments(),
                'currentPage' => ($data['get']['page'] ?? 1)
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
