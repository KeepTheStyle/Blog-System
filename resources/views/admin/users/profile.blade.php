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
        <?php 
            if($users->profile){
                $facebook = $users->profile->facebook;
                $youtube = $users->profile->youtube;
                $about = $users->profile->about;
            }
            else{
                $facebook = "";
                $youtube = "";
                $about = "";
            }


         ?>

         

        <div class="card bg-card text-white">
        
            <div class="card-header"><h1 class="text-center bg-success pt-2 pb-3">MY PROFILE!</h1></div>
        
            <div class="card-body">
            <form action="{{route('profile.update')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="Name">Full Name</label>
                        <input type="text" id="form-control" class="form-control input-lg" name = "name" value="{{$users->name}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="text" id="form-control" class="form-control input-lg" name = "email" placeholder = "example@blahblah.com" value="{{$users->email}}">
                    </div>
                    <div class="form-group">
                        <label for="title">New password</label>
                        <input type="password" id="form-control" class="form-control input-lg" name = "password">
                    </div>

                    <div class="form-group">
                        <label for="title">Avatar</label>
                        <input type="file" class="form-control input-lg" name = "avatar">
                    </div>
                    <div class="form-group">
                        <label for="title">Facebook</label>
                        <input type="text" id="form-control" class="form-control input-lg" name = "facebook" value="{{$facebook}}" >
                    </div>
                    <div class="form-group">
                        <label for="title">Youtube</label>
                        <input type="text" id="form-control" class="form-control input-lg" name = "youtube" value="{{$youtube}}">
                    </div>
                    <div class="form-group">
                        <label for="title">About</label>
                        <textarea name="about" id="content" class = "form-control" cols="30" rows="10">{{$about}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update profile</button>
                        </div>
                        
                    </div>
                </form>
            </div>
                
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