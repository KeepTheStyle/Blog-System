@extends('layouts.app')

@section('content')
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
    <div class="card bg-card text-white">
        <div class="card-header">
                <h1 class="text-center bg-dark pt-2 pb-3">Edit This Post!</h1>
        </div>
        <div class="card-body ">
            <form action="{{route('post.update', ['id'=>$post->id])}}" method="post" enctype = "multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="form-control" class="form-control input-lg" name = "title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="categories">Select a category!</label>
                    <select class="form-control input-lg" name = "category_id">
                     @foreach($categories as $category)
                    <option value="{{$category->id}}"
                    @if($post->category_id == $category->id)
                        selected
                    @endif
                    >{{$category->name}}</option>
                    @endforeach
                     </select>
            
                </div>
                <div class="form-group">
                    <label for="feature">Feature Image</label>
                    <input type="file" class="form-control input-lg" name="featured">
                </div>
                <div class="formgroup">
                <label for="tags">Select a tag<span class="text-danger">*</span></label>
                    @foreach($tags as $single)
                        <div class="checkbox">
                            <label><input type="checkbox" name = "tags[]" value = "{{$single->id}}" 
                            
                            @foreach($post->tags as $t)
                                @if($single->id == $t->id)
                                  checked  
                                @endif
                            @endforeach
                            >{{$single->name}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>
            
                </div>
            </form>
        </div>
    
    </div>
@endsection
@section('scripts')
<script>

$(document).ready(function() {
$('#content').summernote();
});
 
 </script>
 @stop