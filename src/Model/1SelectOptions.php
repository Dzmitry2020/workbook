<?php


namespace Model;


use mysqli;
use TexLab\MyDB\DbEntity;

class SelectOptions
{
    public function getItems(mysqli $link, string $tableName, string $columnName): array {
        $table = new DbEntity($tableName, $link);
        $table
            ->reset()
            ->setSelect('id,'.$columnName)
            ->setOrderBy($columnName);
        $array = [];
        $array = $table->get();
        return $array;
    }
}