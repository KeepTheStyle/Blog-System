@extends('layouts.app')

@section('content')
<div class="card  bg-card text-light">
  <div class="card-header">

      <h1 class="text-center bg-success pt-2 pb-3">List OF Categories!</h1>

  </div>
  <div class="card-body text-white">
    <table class="table table-srtiped">
        <thead class="thead-dark">
            <th>
                 Categories
            </th>
            <th>
                 Delete
            </th>
            <th>
                 Update
            </th>
        </thead>
        <tbody class="text-white">
    
            @if(count($categories)>0)
            @foreach($categories->all() as $category)
            <tr>
                    <td>{{$category->name}}</td>
                    <td><a href="{{route('category.delete' , ['id'=> $category->id])}}" class="btn btn-danger "><i class="fa fa-trash"></i></a></td>
                    <td><a href="{{route('category.edit' , ['id'=> $category->id])}}" class="btn btn-warning "><i class="fa fa-pencil"></i></a></td>
            </tr>
            @endforeach
            @else
            <tr><th class="text-center" colspan="5">No Categories found!</th></tr>
            @endif
        </tbody>
    </table>
  
</div>

@stop