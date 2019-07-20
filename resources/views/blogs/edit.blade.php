@extends('layout.app')
@section('title', 'Cập nhật thông tin')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1 style="margin-left: 30%">Cập nhật thông tin</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('blogs.update', ['id' =>$blog->id])}}">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option
                                        @if($blog->category_id == $category->id)
                                        {{"selected"}}
                                        @endif
                                        value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}" required>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" class="form-control" name="content" value="{{ $blog->content }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
                </form>
            </div>
        </div>
    </div>
@endsection