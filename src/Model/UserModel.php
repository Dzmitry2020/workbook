<?php


namespace Model;

use TexLab\MyDB\DbEntity;

class UserModel extends DbEntity
{
    public function getGroups()
    {
        $res = [];
        foreach ($this->runSQL("SELECT `id`, `name` FROM `groups` ORDER BY `name`") as $row) {
            $res[$row['id']] = $row['name'];
        }
        return $res;
    }

    public function getUsers($pageSize, $page)
    {
        return $this
            ->setSelect('`users`.`id`, `groups`.`name`, `users`.`login`,`users`.`password`,`users`.`email`')
            ->setFrom('`users`, `groups`')
            ->setWhere('users.group_id = groups.id')
            ->setOrderBy('`groups`.`name`')
            ->setPageSize($pageSize)
            ->getPage($page);
    }
}