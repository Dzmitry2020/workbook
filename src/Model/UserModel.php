<?php

/** @var array $page */

namespace Model;

use TexLab\MyDB\DbEntity;

class UserModel extends DbEntity
{
    public function getGroups(): array
    {
        $res = [];
        foreach ($this->runSQL("SELECT `id`, `name` FROM `groups` ORDER BY `name`") as $row) {
            $res[$row['id']] = $row['name'];
        }
        return $res;
    }

    /**
     * @param int $pageSize
     * @param array $page
     * @return array
     */
    public function getUsers($pageSize, $page): array
    {

        return $this
            ->setSelect(
                '`users`.`id`, `users`.`login`, `users`.`password`,`users`.`email`, `users`.`name`, `groups`.`cod`'
            )
            ->setFrom('`users`, `groups`')
            ->setWhere('`users`.`group_id` = `groups`.`id`')
            ->setOrderBy('`groups`.`name`')
            ->setPageSize($pageSize)
            ->getPage($page);
    }
}
