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
    </ul>
    @endif
</div>
    <div class="card bg-card text-white">
        <div class="card-header">
            <h1 class="text-center bg-dark pt-2 pb-3">Create a new post!</h1>
        </div>
        <div class="card-body ">
            <form action="{{route('post.store')}}" method="post" enctype = "multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title<span class="text-danger">*</span></label>
                    <input type="text" id="form-control" class="form-control input-lg" name = "title">
                </div>
                <div class="form-group">
                    <label for="categories">Select a category<span class="text-danger">*</span></label>
                    <select class="form-control input-lg" name = "category_id">
                     @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                     </select>
            
                </div>
                <div class="form-group">
                    <label for="feature">Feature Image<span class="text-danger">*</span></label>
                    <input type="file" class="form-control input-lg" name="featured">
                </div>
            <div class="formgroup">
            <label for="tags">Select a tag<span class="text-danger">*</span></label>
                        @foreach($tag as $single)
                        <div class="checkbox">
                            <label><input type="checkbox" name = "tags[]" value = "{{$single->id}}">{{$single->name}}</label>
                        </div>
                        @endforeach
            </div>
                    
                
            </div>
                <div class="form-group">
                    <label for="content">Content<span class="text-danger">*</span></label>
                    <textarea name="content" id="summernote"></textarea>                </div>
                <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store Post</button>
                </div>
            
                </div>
            </form>
        </div>
    
    </div>
   @endsection
   @section('scripts')
   <script>
   
   $(document).ready(function() {
  $('#summernote').summernote();
});
    
    </script>
    @stop

