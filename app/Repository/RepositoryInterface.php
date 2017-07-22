<?php

namespace App\Repository;

interface RepositoryInterface
{
    public function create(array $params);

    public function delete(int $id);

    public function edit(int $id, array $params);

    public function getById(int $id);

    public function all();
}
