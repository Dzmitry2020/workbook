<?php

namespace Controller;

use Core\Config;
use Model\TaskModel;
use mysqli;
use View\View;

class TasksController extends AbstractTableController
{
    protected string $tableName = "tasks";
    protected string $templateFolder = "tasks";

    public function __construct(View $view, mysqli $link)
    {
        parent::__construct($view, $link);
        $this->table = new TaskModel(
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
            'workerNameList' => $this->table->getWorkerList(),
            'table' => $this
                ->table
                ->getTask(
                    Config::PAGE_SIZE,
                    $data['get']['page'] ?? 1
                )
        ]);
    }

    public function actionShowEdit(array $data)
    {
        parent::actionShowEdit($data);
        $this->view->addData([
            'placeNamesList' => $this->table->getPlaceList(),
            'taskStatusList' => $this->table->getStatus(),
            'workerNameList' => $this->table->getWorkerList()
        ]);
    }

    public function actionAdd(array $data)
    {
        $workers = $data['post']['workers'] ?? [];
        unset($data['post']['workers']);

        $task_id = $this->table->add($data['post']);

        $this->table->addWorkers(
            $workers,
            $task_id
        );
        $this->redirect('?action=show&type=' . $this->getClassName());
    }
}