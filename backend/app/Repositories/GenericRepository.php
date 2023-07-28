<?php

namespace App\Repositories;

abstract class GenericRepository
{
    private $entity;

    public function __construct(object $object)
    {
        $this->entity = $object;
    }

    public function all()
    {
        return $this->entity->all();
    }

    public function save($attributes)
    {
        return $this->entity->create($attributes);
    }

    public function find($id)
    {
        return $this->entity->find($id);
    }

    public function update($id, $attributes)
    {
        return $this->entity->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->entity->destroy($id);
    }
}
