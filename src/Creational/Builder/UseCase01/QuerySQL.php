<?php

namespace App\Creational\Builder\UseCase01;

class QuerySQL
{
    public $select;
    public $from;
    public $where = [];
    public $orderBy;
    public $limit;

    public function __toString(): string
    {
        $query = "SELECT " . implode(", ", $this->select);
        $query .= " FROM " . $this->from;

        if (!empty($this->where)) {
            $query .= " WHERE " . implode(" AND ", $this->where);
        }

        if ($this->orderBy) {
            $query .= " ORDER BY " . $this->orderBy;
        }

        if ($this->limit) {
            $query .= " LIMIT " . $this->limit;
        }

        return $query . ";";
    }
}