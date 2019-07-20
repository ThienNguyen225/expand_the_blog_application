<?php


namespace App\Http\Service\category;


use App\Category;
use App\Http\Repository\category\CategoryRepository;

class CategoryServiceImpl implements CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        $categories = $this->categoryRepository->getAll();
        return $categories;
    }

    public function create($request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $this->categoryRepository->create($category);
    }

    public function findById($id)
    {
        $category = $this->categoryRepository->findById($id);
        return $category;
    }

    public function update($request, $id)
    {
        $category = $this->findById($id);
        $category->name = $request->input('name');
        $this->categoryRepository->update($category);

    }

    public function delete($id)
    {
        $category = $this->findById($id);
        $this->categoryRepository->delete($category);
    }

}