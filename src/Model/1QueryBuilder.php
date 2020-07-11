<?php

namespace Model;

trait QueryBuilder
{
    public function setSelect(string $fields)
    {
        $this->current["SELECT"] = $fields;
        return $this;
    }

    public function addSelect(string $fields)
    {
        $this->current["SELECT"] .= ", $fields";
        return $this;
    }

    public function setFrom(string $tables)
    {
        $this->current["FROM"] = $tables;
        return $this;
    }

    public function addFrom(string $tables)
    {
        $this->current["FROM"] .= ", $tables";
        return $this;
    }

    public function setWhere(string $condition)
    {
        $this->current["WHERE"] = $condition;
        return $this;
    }

    public function addWhere(string $condition)
    {
        $this->current["WHERE"] .= " AND $condition";
        return $this;
    }

    public function setGroupBy(string $fields)
    {
        $this->current["GROUP BY"] = $fields;
        return $this;
    }

    public function addGroupBy(string $fields)
    {
        $this->current["GROUP BY"] .= ", $fields";
        return $this;
    }

    public function setHaving(string $condition)
    {
        $this->current["HAVING"] = $condition;
        return $this;
    }

    public function addHaving(string $condition)
    {
        $this->current["HAVING"] .= " AND $condition";
        return $this;
    }

    public function setOrderBy(string $fields)
    {
        $this->current["ORDER BY"] = $fields;
        return $this;
    }

    public function addOrderBy(string $fields)
    {
        $this->current["ORDER BY"] .= ", $fields";
        return $this;
    }

    public function setLimit(string $limit)
    {
        $this->current["LIMIT"] = $limit;
        return $this;
    }


}