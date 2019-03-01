
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
        
            <div class="card-header"><h1 class="text-center bg-success pt-2 pb-3">Edit Site Info!</h1></div>
        
            <div class="card-body">
            <form action="{{route('setting.update',['id'=>$setting->id])}}" method="post">
                 @csrf
                    <div class="form-group">
                        <label for="Name">Site-Name</label>
                        <input type="text" id="form-control" class="form-control input-lg" name = "site_name" value="{{$setting->site_name}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="text" id="form-control" class="form-control input-lg" name = "email" placeholder = "example@blahblah.com" value="{{$setting->email}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Address</label>
                        <input type="text" id="form-control" class="form-control input-lg" name = "address" value="{{$setting->address}}">
                    </div>

                    <div class="form-group">
                        <label for="title">About</label>
                        <textarea name="about" id="content" class = "form-control" cols="30" rows="10">{{$setting->about}}</textarea>
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