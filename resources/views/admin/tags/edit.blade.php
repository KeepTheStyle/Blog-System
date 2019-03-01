@extends('layouts.app')
<div class="container">
        @if(count($errors)>0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
                {{$error}}
            </li>
            @endforeach
        </ul><br>
        @endif
    </div>
@section('content')
<h1 class="text-center bg-dark pt-2 pb-3">Edit tag!</h1>
    <form action="{{route('tag.update',['id'=>$tag->id])}}" method="post">
    @csrf
        <div class="form-group">
            <label for="name"> Tag Name</label>
            <input type="text" id="form-control" class="form-control input-lg" name = "name"  value = "{{$tag->name}}">
        </div>
        <div class="form-group">
            <div class="text-center">
            <button class="btn btn-success" type="submit">Update Tag</button>
            </div>
            
        </div>
    </form>
@stop