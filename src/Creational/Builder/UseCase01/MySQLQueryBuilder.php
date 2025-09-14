<?php

namespace App\Creational\Builder\UseCase01;

class MySQLQueryBuilder implements ISQLQueryBuilder
{
    private $query;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->query = new QuerySQL();
    }

    public function select(array $fields): self
    {
        $this->query->select = $fields;
        return $this; // Permite encadenar métodos (fluent interface)
    }

    public function from(string $table): self
    {
        $this->query->from = $table;
        return $this;
    }

    public function where(string $condition): self
    {
        $this->query->where[] = $condition;
        return $this;
    }

    public function orderBy(string $field, string $direction = 'ASC'): self
    {
        $this->query->orderBy = "$field $direction";
        return $this;
    }

    public function limit(int $count): self
    {
        $this->query->limit = $count;
        return $this;
    }

    public function getQuery(): QuerySQL
    {
        $result = $this->query;
        $this->reset(); // Opcional: reiniciar para la siguiente consulta
        return $result;
    }
}