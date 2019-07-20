@extends('layout.app')
@section('title', 'Thêm thông tin blog')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1 style="margin-left: 30%">Thêm thông tin blog</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('blogs.store')}}" style="margin-left: 20%; margin-right: 20%">
                    @csrf
                    <div class="form-group">
                        <label>Categories</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" class="form-control" name="content" placeholder="Enter content" required>
                    </div>
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
    @endsection