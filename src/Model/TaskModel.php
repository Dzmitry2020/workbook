<?php
/** @var array $page
 * @var int $pageSize
 */

namespace Model;

use TexLab\MyDB\DbEntity;

class TaskModel extends DbEntity

{
    public function getNames(): array
    {
        $res = [];
        foreach ($this->runSQL('SELECT id, name FROM place') as $row) {
            $res[$row['id']] = $row['name'];
        }
        return $res;
    }

    public function getStatus(): array
    {
        $res = [];
        foreach ($this->runSQL('SELECT id, name FROM taskstate') as $row) {
            $res[$row['id']] = $row['name'];
        }
        return $res;
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