<?php


namespace App\Http\Repository\category;


use App\Category;

class CategoryRepositoryImpl implements CategoryRepository
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    public function getModel(){
        $model = Category::class;
        return $model;
    }

    public function setModel(){
        $this->model = app()->make($this->getModel());
    }
    public function getAll()
    {
        $categories = $this->model->paginate(5);
        return $categories;
    }


    public function create($object)
    {
        return $object->save();
    }

    public function findById($id){
        $category = $this->model->findOrFail($id);
        return $category;
    }

    public function update($object)
    {
        return $object->save();
    }

    public function delete($object)
    {
        return $object->delete();
    }
}