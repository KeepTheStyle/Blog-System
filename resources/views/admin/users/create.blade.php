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
<div class="card bg-card tex-white">
  
    <div class="card-header"><h1 class="text-center bg-success pt-2 pb-3">Create a new User!</h1></div>
  
  <div class="card-body text-white">
  <form action="{{route('user.store')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="Name">Full Name</label>
            <input type="text" id="form-control" class="form-control input-lg" name = "name">
        </div>
        <div class="form-group">
            <label for="title">Email</label>
            <input type="text" id="form-control" class="form-control input-lg" name = "email" placeholder = "example@blahblah.com">
        </div>
        <div class="form-group">
            <label for="title">Password</label>
            <input type="password" id="form-control" class="form-control input-lg" name = "password">
        </div>
        <div class="form-group">
            <div class="text-center">
            <button class="btn btn-success" type="submit">Store User</button>
            </div>
            
        </div>
    </form>
  </div>
    
    </div>
</div>
@endsection