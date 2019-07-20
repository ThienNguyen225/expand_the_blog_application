@extends('layout.app')
@section('title', 'Thêm Blog')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1 style="margin-left: 40%">Thêm Categories</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('categories.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                        @if($errors->has('name'))
                            <p style="color: red">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection