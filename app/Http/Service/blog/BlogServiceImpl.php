<?php


namespace App\Http\Service\blog;


use App\Blog;
use App\Http\Repository\blog\BlogRepository;
use App\Http\Repository\blog\BlogRepositoryImpl;

class BlogServiceImpl implements BlogService
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getAll()
    {
        $blogs = $this->blogRepository->getAll();
        return $blogs;
    }

    public function create($request)
    {
        $blog = new Blog();
        $blog->category_id = $request->input('category_id');
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $this->blogRepository->create($blog);
    }

    public function findById($id)
    {
        return $this->blogRepository->findById($id);
    }

    public function update($request, $id)
    {
        $blog = $this->findById($id);
        $blog->category_id = $request->input('category_id');
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $this->blogRepository->update($blog);
    }

    public function delete($id)
    {
        $blogs = $this->findById($id);
        $this->blogRepository->delete($blogs);
    }
}