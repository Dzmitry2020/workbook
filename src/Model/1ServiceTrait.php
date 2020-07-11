<?php

namespace Model;

trait ServiceTrait
{
    /**
     * возвращает список полей в таблице
     * 
     */
    public function getFields()
    {
        $result = $this->mysqli->query("SHOW COLUMNS FROM $this->tableName");
        return array_column($this->queryResultToArray($result), 'Field');
    }

    public function getComments()
    {
        $result = $this->mysqli->query("SHOW FULL COLUMNS FROM $this->tableName");
        $data = $this->queryResultToArray($result);

        return array_combine(
            array_column($data, 'Field'),
            array_column($data, 'Comment')
        );
    }
}
