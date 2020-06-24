<?php

namespace Model;

use mysqli;

class DbTable extends AbstractTable implements CRUDInterface
{
    use QueryBuilder,
        ServiceTrait;

    protected $mysqli;
    protected $tableName;
    protected $current;
    protected const SELECT_DEFAULT = [
        "SELECT" => "*",
        "FROM" => null,
        "WHERE" => "1",
        "GROUP BY" => null,
        "HAVING" => null,
        "ORDER BY" => null,
        "LIMIT" => null
    ];

    public function __construct(mysqli $mysqli, $tableName)
    {
        $this->mysqli = $mysqli;
        $this->current["FROM"] = $this->tableName = $tableName;

    }

    public function getSql()
    {
        $sql = "";
        foreach (array_merge(self::SELECT_DEFAULT, $this->current) as $key => $value) {
            if (!empty ($value)) {
                $sql .= "$key $value\n";
            }
        }
        return $sql;
    }

    public function get(int $id = null): array
    {
        if ($id === null) {
            $result = $this->mysqli->query($this->getSql());
        } else {
            $result = $this->mysqli->query($this->setWhere("`id`=$id")->getSql());
        }

        return $this->queryResultToArray($result);
    }

    public function add(array $data): int
    {
        //INSERT INTO `table124` (`text`, `name`) VALUES ("ЗДарова", "Петрович")
        $fildNames = [];

        foreach (array_keys($data) as $value) {
            $fildNames[] = $value;
        }

        $sql = "INSERT INTO `$this->tableName` (`" . implode("`, `", $fildNames) . "`) VALUES ('" . implode("', '", $data) . "');";

        $this->mysqli->query($sql);

        return $this->mysqli->insert_id;
    }

    public function edit(int $id, array $data)
    {
        $editData = [];
        foreach ($data as $key => $value) {
            $editData[] = " `$key` = '$value' ";
        }

        $sql = "UPDATE `$this->tableName` SET " . implode(", ", $editData) . " WHERE id = $id;";
        $this->mysqli->query($sql);
        return $this;
        //UPDATE table124 SET `name`= 'Василий', `text`= 'Просто здарвствуй' WHERE id = 4;
    }

    public function del(int $id)
    {
        $sql = "DELETE FROM `$this->tableName` WHERE id=$id;";
        $this->mysqli->query($sql);
        return $this;
    }
}
