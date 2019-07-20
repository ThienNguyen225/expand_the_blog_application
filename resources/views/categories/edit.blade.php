@extends('layout.app')
@section('title', 'Cập nhật thông tin')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1 style="margin-left: 40%">Cập nhật thông tin</h1>
            </div>
            <div class="col-8">
                <form method="post" action="{{route('categories.update', ['id' =>$category->id])}}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}" required>
                        @if($errors->has('name'))
                            <p style="color: red">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
@endsection