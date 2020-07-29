<?php
/** @var array $page
 * @var int $pageSize
 */

namespace Model;

use TexLab\MyDB\DbEntity;

class TaskModel extends DbEntity

{
    public function getPlaceList(): array
    {
        $res = [];
        foreach ($this->runSQL('SELECT `id`, `name` FROM `place`') as $row) {
            $res[$row['id']] = $row['name'];
        }
        return $res;
    }

    public function getStatus(): array
    {
        $res = [];
        foreach ($this->runSQL('SELECT `id`, `name` FROM `taskstate`') as $row) {
            $res[$row['id']] = $row['name'];
        }
        return $res;
    }

    public function getWorkerList(): array
    {
        $res = [];
        foreach ($this->runSQL('SELECT `id`,`firstName`,`name`,`fatherName` FROM `people` ORDER BY `firstName`') as $row) {
            $res[$row['id']] = $row['firstName']
                . ' '
                . mb_substr($row['name'], 0, 1)
                . '.'
                . mb_substr($row['fatherName'], 0, 1)
                . '.';
        }
        return $res;
    }

    public function  addWorkers(array $peopleIds, int $taskId){
        $worker = new DbEntity('worker', $this->mysqli);
        foreach ($peopleIds as $peopleId) {
            $worker->add(['people_id'=>$peopleId, 'task_id'=>$taskId]);
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
            ->setSelect('tasks.id, tasks.status, tasks.date, place.name, tasks.content, tasks.comment')
            ->setFrom('tasks, place')
            ->setWhere('place.id = tasks.place_id')
            ->setOrderBy('tasks.date')
            ->setPageSize($pageSize)
            ->getPage($page);
    }

}