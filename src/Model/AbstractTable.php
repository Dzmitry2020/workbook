<?php

namespace Model;

abstract class AbstractTable
{
    protected function queryResultToArray($result): array
    {
        $array = [];
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }

   
}
