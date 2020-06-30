<?php

namespace Model;

trait QueryBuilderTrait
{
    public function clear()
    {
        $this->currentQuery = [];
        $this->setFrom($this->tableName);
        return $this;
    }

    public function setSelect(string $fields)
    {
        $this->currentQuery["SELECT"] = $fields;
        return $this;
    }

    public function addSelect(string $fields)
    {
        $this->currentQuery["SELECT"] .= ", $fields";
        return $this;
    }

    public function setFrom(string $tables)
    {
        $this->currentQuery["FROM"] = $tables;
        return $this;
    }

    public function addFrom(string $tables)
    {
        $this->currentQuery["FROM"] .= ", $tables";
        return $this;
    }

    public function setWhere(string $condition)
    {
        $this->currentQuery["WHERE"] = $condition;
        return $this;
    }

    public function addWhere(string $condition)
    {
        $this->currentQuery["WHERE"] .= " AND $condition";
        return $this;
    }

    public function setGroupBy(string $fields)
    {
        $this->currentQuery["GROUP BY"] = $fields;
        return $this;
    }

    public function addGroupBy(string $fields)
    {
        $this->currentQuery["GROUP BY"] .= ", $fields";
        return $this;
    }

    public function setHaving(string $condition)
    {
        $this->currentQuery["HAVING"] = $condition;
        return $this;
    }

    public function addHaving(string $condition)
    {
        $this->currentQuery["HAVING"] .= " AND $condition";
        return $this;
    }

    public function setOrderBy(string $fields)
    {
        $this->currentQuery["ORDER BY"] = $fields;
        return $this;
    }

    public function addOrderBy(string $fields)
    {
        $this->currentQuery["ORDER BY"] .= ", $fields";
        return $this;
    }

    public function setLimit(string $limit)
    {
        $this->currentQuery["LIMIT"] = $limit;
        return $this;
    }


}