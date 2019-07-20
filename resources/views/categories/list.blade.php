@extends('layout.app')
@section('title', 'Hiển thị danh sach blog')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1 style="margin-left: 35%">Danh sách Categories</h1>
            </div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <div class="col-12" style="margin-left: 15%">
                <form class="navbar-form navbar-left" action="{{route('categories.search')}}">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-default">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <a href="{{route('categories.create')}}">
                    <button class="btn btn-primary">ADD</button>
                </a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number Blog</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($categories) === 0)
                        <tr>
                            <td colspan="4">No Date</td>
                        </tr>
                    @else
                        @foreach($categories as $key => $category)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{count($category->blogs)}}</td>
                                <td>
                                    <a href="{{route('categories.edit', ['id'=>$category->id])}}">
                                        <button class="btn btn-warning">Edit</button>
                                    </a>
                                    <a href="{{route('categories.delete', ['id' => $category->id])}}"
                                       onclick="return confirm('Do you want to delete??')">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $categories->appends(request()->query()) }}
@endsection