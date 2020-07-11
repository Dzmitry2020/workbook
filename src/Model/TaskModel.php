<?php


namespace Model;

use TexLab\MyDB\DbEntity;

class TaskModel extends DbEntity

{
    public function getNames()
    {
        $res = [];
        foreach ($this->runSQL('SELECT id, name FROM place') as $row) {
            $res[$row['id']] = $row['name'];
        }
        return $res;
    }

    public function getTask($pageSize, $page)
    {
        return $this->setSelect('tasks.id, place.name, tasks.date,  tasks.status,tasks.content, tasks.comment')
            ->setFrom('tasks, place')
            ->setWhere('place.id = tasks.fkPlace')
            ->setPageSize($pageSize)
            ->getPage($page);
    }
}