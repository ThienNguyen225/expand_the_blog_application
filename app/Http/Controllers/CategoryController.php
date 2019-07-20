<?php

namespace App\Http\Controllers;


use App\Category;
use App\Http\Requests\CategoriesRequest;
use App\Http\Service\blog\BlogService;
use App\Http\Service\category\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $blogService;

    public function __construct(CategoryService $categoryService, BlogService $blogService)
    {
        $this->categoryService = $categoryService;
        $this->blogService = $blogService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('categories.list', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoriesRequest $request)
    {
        $this->categoryService->create($request);
        Session::flash('success', 'Thêm thành công');
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return view('categories.edit', compact('category'));
    }

    public function update(CategoriesRequest $request, $id)
    {
        $this->categoryService->update($request, $id);
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);
        return redirect()->route('categories.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('categories.index');
        }
        $categories = Category::where('name', 'LIKE', '%' . $keyword .'%')->paginate(5);
        return view('categories.list', compact('categories'));
    }
}
