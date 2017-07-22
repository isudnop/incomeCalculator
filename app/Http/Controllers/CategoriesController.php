<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show()
    {
        return view('category');
    }

    public function add(Request $request)
    {
        $params = $request->only(['name', 'group_id']);

        //validate

        $this->categoryRepository->create($params);

        return redirect('show-category');
    }

    public function edit(Request $request, int $id)
    {
        $params = $request->all();

        $this->categoryRepository->edit($id, $params);

        return redirect('show-category');
    }

    public function delete(int $id)
    {
        $this->categoryRepository->delete($id);

        return redirect('show-category');
    }
}
