@extends('layouts.app')

@section('content')
<div class="card bg-card text-white">
    @if(count($errors)>0)
    <ul class="list-group">
        @foreach($errors->all() as $error)
        <li class="list-group-item text-danger">
            {{$error}}
        </li>
        @endforeach
    </ul>
    @endif
    <div class="card-header"><h1 class="text-center bg-success pt-2 pb-3">Create a category!</h1></div>
  
  <div class="card-body">
  <form action="{{route('category.store')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="title">Category Name</label>
            <input type="text" id="form-control" class="form-control input-lg" name = "name">
        </div>
        <div class="form-group">
            <div class="text-center">
            <button class="btn btn-success" type="submit">Store Category</button>
            </div>
            
        </div>
    </form>
  </div>
    
    </div>
</div>
@endsection