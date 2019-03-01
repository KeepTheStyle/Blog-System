@extends('layouts.app')

@section('content')
<div class="card  bg-card text-white">
  <div class="card-header">

          <h1 class="text-center bg-success pt-2 pb-3">Al Posts!</h1>

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
                 Make Trash
            </th>
            <th>
                 Update
            </th>
        </thead>
        <tbody class="text-white">
    
            @if(count($posts)>0)
            @foreach($posts as $post)
            <tr>
                    <td><img src="{{$post->newpath.'/'.$post->img_path}}" alt="{{$post->title}}" class="img-thumbnail" height="100"  width="500"></td>
                    <td>{{$post->slug}}</td>
                    <td><a href="{{route('post.delete' , ['id'=> $post->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                    <td><a href="{{route('post.edit' , ['id'=> $post->id])}}" class="btn btn-warning btn-sm "><i class="fa fa-pencil fa-lg"></i></a></td>
            </tr>
            @endforeach
            @else
            <tr><th class="text-center" colspan="5">No trashed posts!</th></tr>
            @endif
        </tbody>
    </table>
  
</div>
@stop