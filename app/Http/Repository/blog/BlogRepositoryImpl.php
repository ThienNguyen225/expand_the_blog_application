<?php


namespace App\Http\Repository\blog;


use App\Blog;

class BlogRepositoryImpl implements BlogRepository
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    public function getModel()
    {
        $model = Blog::class;
        return $model;
    }

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        $blogs = $this->model->paginate(5);
        return $blogs;
    }

    public function create($object)
    {
        return $object->save();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
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