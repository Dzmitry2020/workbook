<?php

namespace Controller;

use Core\Config;
use Model\TripsModel;
use mysqli;
use View\View;

class TripsController extends AbstractTableController
{
    protected string $tableName = "trips";
    protected string $templateFolder = "trips";

    public function __construct(View $view, mysqli $link)
    {
        parent::__construct($view, $link);
        $this->table = new TripsModel(
            $this->tableName,
            $link
        );
    }

    public function actionShow(array $data)
    {
        parent::actionShow($data);
        $this->view->addData([
            'carsList' => $this->table->getCarsList(),
            'driversList' => $this->table->getDriversList(),
            'tasksList' => $this->table->getTasksList(),
            'table' => $this
                ->table
                ->getTrips(
                    Config::PAGE_SIZE,
                    $data['get']['page'] ?? 1
                )
        ]);
    }

    public function actionViews(array $data)
    {
        parent::actionViews($data);
        $this->view->addData([
            'table' => $this
                ->table
                ->getTripsPlan(
                    Config::PAGE_SIZE,
                    $data['get']['page'] ?? 1
                ),
            'pageCount' => ceil($this->table->getTripsCount() / Config::PAGE_SIZE)
        ]);
    }

    public function actionShowEdit(array $data)
    {
        parent::actionShowEdit($data);
        $this->view->addData([
            'carsList' => $this->table->getCarsList(),
            'driversList' => $this->table->getDriversList(),
            'tasksList' => $this->table->getTasksList()
        ]);
    }

    public function actionEdit(array $data)
    {
        $editData = $data['post'];
        unset($editData['id']);

        $this->table->edit(
            ['id' => $data['post']['id']],
            $editData
        );

        $this->redirect(
            '?action=show&type='
            . $this->getClassName()
            . '&page=' . $data['get']['page']
        );
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
}
