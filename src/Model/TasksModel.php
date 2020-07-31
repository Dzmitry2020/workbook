<?php

/** @var array $page
 * @var int $pageSize
 */

namespace Model;

use TexLab\MyDB\DbEntity;

class TasksModel extends DbEntity
{
    public function getPlaceList(): array
    {
        $res = [];
        foreach ($this->runSQL('SELECT `id`, `name` FROM `places`') as $row) {
            $res[$row['id']] = $row['name'];
        }
        return $res;
    }

    public function getStatus(): array
    {
        $res = [];
        foreach ($this->runSQL('SELECT `id`, `name` FROM `taskstates`') as $row) {
            $res[$row['id']] = $row['name'];
        }
        return $res;
    }

    public function getPeopleList(): array
    {
        $res = [];
        foreach (
            $this->runSQL(
                'SELECT `id`,`firstName`,`name`,`fatherName` FROM `people` ORDER BY `firstName`'
            ) as $row
        ) {
            $res[$row['id']] = $row['firstName']
                . ' '
                . mb_substr($row['name'], 0, 1)
                . '.'
                . mb_substr($row['fatherName'], 0, 1)
                . '.';
        }
        return $res;
    }

    public function getWorkersIds(int $idTask): array
    {
        $res = [];
        foreach (
            $this->runSQL(
                'SELECT `people_id` FROM `workers` WHERE `tasks_id`=' . $idTask
            ) as $row
        ) {
            $res[] = $row['people_id'];
        }
        return $res;
    }

    public function addWorkers(int $taskId, array $peopleIds)
    {
        $worker = new DbEntity('workers', $this->mysqli);
        foreach ($peopleIds as $peopleId) {
            $worker->add(
                [
                    'people_id' => $peopleId,
                    'tasks_id' => $taskId
                ]
            );
        }
    }

    public function delWorkers(int $taskId)
    {
        $workers = new DbEntity('workers', $this->mysqli);
        $workerIds = $workers->runSQL(
            "SELECT `id` FROM `workers` WHERE `tasks_id`= $taskId"
        );
        foreach ($workerIds as $workerId) {
            $workers->del(['id' => $workerId['id']]);
        }
    }

    /**
     * @param $pageSize
     * @param $page
     * @return array
     */
    public function getTask($pageSize, $page): array
    {

        return $this
            ->setSelect('tasks.id, tasks.status, tasks.date, places.name, tasks.content, tasks.comment')
            ->setFrom('tasks, places')
            ->setWhere('places.id = tasks.places_id')
            ->setOrderBy('tasks.date')
            ->setPageSize($pageSize)
            ->getPage($page);
    }
}
