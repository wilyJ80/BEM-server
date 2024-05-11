<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected Model $model;
    protected $query;

    public function __construct(
        Model $model
    ) {
        $this->model = $model;
        $this->query = $model->query();
    }

    protected function whereId(int $id)
    {
        return $this->query->where('id', $id);
    }

    protected function whereUuid(string $uuid)
    {
        return $this->query->where('uuid', $uuid);
    }

    protected function findId(int $id)
    {
        return $this->query->find($id);
    }

    protected function findUuid(string $uuid)
    {
        return $this->query->where('uuid', $uuid)->first();
    }

    protected function ilike(string $fieldName, $value)
    {
        return $this->query->where($fieldName, 'ilike', $value);
    }

    protected function where(string $fieldName, $value, $operator = '=')
    {
        return $this->query->where($fieldName, $operator, $value);
    }

    protected function orWhere(string $fieldName, $value, $operator = '=')
    {
        return $this->query->orWhere($fieldName, $operator, $value);
    }

    protected function get(array $columns = ['*'])
    {
        return $this->query->get($columns);
    }
}
