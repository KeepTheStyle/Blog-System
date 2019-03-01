@extends('layouts.app')

@section('content')
<div class="card  bg-card text-white">
  <div class="card-header">

          <h1 class="text-center bg-dark pt-2 pb-3">My Trashed Posts!</h1>

  </div>
  <div class="card-body">
    <table class="table table-srtiped">
        <thead class="thead-dark">
            <th>
                 Image
            </th>
            <th>
                 Title
            </th>
            <th>
                 Delete
            </th>
            <th>
                 Restore
            </th>
        </thead>
        <tbody class="text-white">
    
            @if(count($posts)>0)
            @foreach($posts as $post)
            <tr>
                    <td><img src="{{$post->newpath.'/'.$post->img_path}}" alt="{{$post->title}}" class="img-thumbnail" height="100"  width="500"></td>
                    <td>{{$post->slug}}</td>
                    <td><a href="{{route('post.kill' , ['id'=> $post->id])}}" class="btn btn-danger ">Delete</a></td>
                    <td><a href="{{route('post.restore' , ['id'=> $post->id])}}" class="btn btn-warning "><i class="fa fa-reply"></i></a></td>
            </tr>
            @endforeach
            @else
            <tr><th class="text-center" colspan="5">No trashed posts!</th></tr>
            @endif
    
        </tbody>
    </table>
  
</div>
@stop