@extends('layouts.app')

@section('content')
<div class="card  bg-card text-white">
  <div class="card-header">

      <h1 class="text-center bg-dark pt-2 pb-3">LIST OF MY TAGS</h1>

  </div>
  <div class="card-body">
    <table class="table table-srtiped">
        <thead class="thead-dark">
            <th>
                 Tags
            </th>
            <th>
                 Delete
            </th>
            <th>
                 Update
            </th>
        </thead>
        <tbody class="text-white">
    
            @if(count($tag)>0)
            @foreach($tag as $single)
            <tr>
                    <td>{{$single->name}}</td>
                    <td><a href="{{route('tag.delete' , ['id'=> $single->id])}}" class="btn btn-danger "><i class="fa fa-trash"></i></a></td>
                    <td><a href="{{route('tag.edit' , ['id'=> $single->id])}}" class="btn btn-warning "><i class="fa fa-pencil"></i></a></td>
            </tr>
            @endforeach
            @else
            <tr><th class="text-center" colspan="5">No Tags found!</th></tr>
            @endif
        </tbody>
    </table>
  
</div>

@stop