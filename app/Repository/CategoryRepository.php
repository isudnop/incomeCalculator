<?php

namespace App\Repository;

use App\Models\Categories;
use App\Models\CategoryGroup;

class CategoryRepository
{
    public function __construct(Categories $category, CategoryGroup $group)
    {
        $this->category = $category;
        $this->group    = $group;
    }

    public function createCategory(){}

    public function createGroup(){}
    
    public function editCategory(){}

    public function editGroup(){}

    public function deleteCategory(){}

    public function deleteGroup(){}
}
