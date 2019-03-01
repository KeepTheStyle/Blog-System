@extends('layouts.app')

@section('content')
<h1 class="text-center bg-success pt-2 pb-3">Edit Category!</h1>
    <form action="{{route('category.update',['id'=>$category->id])}}" method="post">
    @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="form-control" class="form-control input-lg" name = "name"  value = "{{$category->name}}">
        </div>
        <div class="form-group">
            <div class="text-center">
            <button class="btn btn-success" type="submit">Update Category</button>
            </div>
            
        </div>
    </form>
@stop