<?php

namespace App\Repository;

use App\Models\Categories;

class CategoryRepository extends CommonRepository
{
    public function model()
    {
        return '\App\Models\Categories';
    }
}
