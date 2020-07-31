<?php

namespace Model;

use TexLab\MyDB\Runner;

class LoginModel extends Runner
{
    public function checkUser(string $login, string $password)
    {
        return $this->runSQL(<<<SQL
SELECT `groups`.`cod` , `users`.`name`, `groups`.`name` as 'group'
FROM `users` , `groups`
WHERE `users`.`group_id` = `groups`.`id`
AND BINARY `users`.`login` = '$login'
AND BINARY `users`.`password` = '$password'
SQL
        )[0];
    }
}
