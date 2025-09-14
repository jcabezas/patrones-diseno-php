<?php

namespace App\Creational\Builder\UseCase01;

interface ISQLQueryBuilder
{
    public function select(array $fields): self;
    public function from(string $table): self;
    public function where(string $condition): self;
    public function orderBy(string $field, string $direction = 'ASC'): self;
    public function limit(int $count): self;
    public function getQuery(): QuerySQL;
}