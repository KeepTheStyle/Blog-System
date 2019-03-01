@extends('layouts.app')

@section('content')
@if(count($errors)>0)
    <ul class="list-group">
        @foreach($errors->all() as $error)
        <li class="list-group-item text-danger">
            {{$error}}
        </li>
        @endforeach
    </ul><br>
    @endif
<div class="card bg-card text-white">
  
    <div class="card-header"><h1 class="text-center bg-dark pt-2 pb-3">Create a new tag!</h1></div>
  
  <div class="card-body">
  <form action="{{route('tag.store')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="title">Enter a tag</label>
            <input type="text" id="form-control" class="form-control input-lg" name = "tag">
        </div>
        <div class="form-group">
            <div class="text-center">
            <button class="btn btn-success" type="submit">Store Tag</button>
            </div>
            
        </div>
    </form>
  </div>
    
    </div>
</div>
@endsection