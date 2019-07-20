<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\BlogsRequest;
use App\Http\Service\blog\BlogService;
use App\Http\Service\category\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    protected $blogService;
    protected $categoryService;

    public function __construct(BlogService $blogService, CategoryService $categoryService)
    {
        $this->blogService = $blogService;
        $this->categoryService = $categoryService;
    }

    public function index(){
        $blogs = $this->blogService->getAll();
        $categories = $this->categoryService->getAll();
        return view('blogs.list', compact('blogs', 'categories'));
    }

    public function create(){
        $categories = $this->categoryService->getAll();
        return view('blogs.create', compact('categories'));
    }

    public function store(BlogsRequest $request){
        $this->blogService->create($request);
        Session::flash('success', 'Thêm thành công');
        return redirect()->route('blogs.index');
    }

    public function edit($id){
        $categories = $this->categoryService->getAll();
        $blog = $this->blogService->findById($id);
        return view('blogs.edit', compact('categories','blog'));
    }

    public function update(BlogsRequest $request, $id){
        $this->blogService->update($request, $id);
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('blogs.index');
    }

    public function delete($id){
        $this->blogService->delete($id);
        return redirect()->route('blogs.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('blogs.index');
        }
        $blogs = Blog::where('title', 'LIKE', '%' . $keyword .'%')->paginate(5);
        $categories = $this->categoryService->getAll();
        return view('blogs.list', compact('categories', 'blogs'));
    }
}
