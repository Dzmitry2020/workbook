<?php

namespace Controller;

use Core\Config;
use Model\TasksModel;
use mysqli;
use View\View;

class TasksController extends AbstractTableController
{
    protected string $tableName = "tasks";
    protected string $templateFolder = "tasks";

    public function __construct(View $view, mysqli $link)
    {
        parent::__construct($view, $link);
        $this->table = new TasksModel(
            $this->tableName,
            $link
        );
    }

    public function actionShow(array $data)
    {
        parent::actionShow($data);
        $this->view->addData([
            'placeNamesList' => $this->table->getPlaceList(),
            'taskStatusList' => $this->table->getStatus(),
            'workerNameList' => $this->table->getPeopleList(),
            'table' => $this
                ->table
                ->getTask(
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
                ->getTasksRun(
                    Config::PAGE_SIZE,
                    $data['get']['page'] ?? 1
                ),
            'pageCount' => $this->table->getTasksRunCount()
        ]);
    }

    public function actionShowEdit(array $data)
    {
        parent::actionShowEdit($data);
        $this->view->addData([
            'placeNamesList' => $this->table->getPlaceList(),
            'taskStatusList' => $this->table->getStatus(),
            'workerNameList' => $this->table->getPeopleList(),
            'workersIds' => $this->table->getWorkersIds($data['get']['id'])
        ]);
    }

    public function actionEdit(array $data)
    {
        $workers = $data['post']['workers'] ?? [];
        $editData = $data['post'];
        unset($editData['id']);
        unset($editData['workers']);

        $this->table->edit(
            ['id' => $data['post']['id']],
            $editData
        );

        if ($workers != $this->table->getWorkersIds($data['post']['id'])) {
            $this->table->delWorkers(
                $data['post']['id']
            );
            $this->table->addWorkers(
                $data['post']['id'],
                $workers
            );
        }

        $this->redirect(
            '?action=show&type='
            . $this->getClassName()
            . '&page=' . $data['get']['page']
        );
    }

    public function actionAdd(array $data)
    {
        $workers = $data['post']['workers'] ?? [];
        unset($data['post']['workers']);

        $task_id = $this->table->add($data['post']);

        $this->table->addWorkers(
            $task_id,
            $workers
        );

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
            $this->table->delWorkers($id);
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
