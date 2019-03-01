@extends('layouts.app')

@section('content')
<div class="card  bg-card text-white">
     <div class="card-header">

               <h1 class="text-center bg-success pt-2 pb-3">LIST OF USERS!</h1>

     </div>
     <div class="card-body">
          <table class="table table-srtiped">
               <thead class="thead-dark">
                    <th>
                         Image
                    </th>
                    <th>
                         Name
                    </th>
                    <th>
                         Email
                    </th>
                    <th>
                         Permissions
                    </th>
                    <th>
                         Delete
                    </th>
               </thead>
               <tbody class="text-white">
                    @if(count($users->all())>0)
                          @foreach($users as $user)
                         <tr>
                              <td>
                              @if( $user->profile && $user->profile->avatar)
                                   <img src="{{$user->avatar.'/'.$user->profile->avatar}}"
                                   alt="" 
                                    height="50"  width="50" style = "border-radius:50%">
                               @else
                                   <img src="{{$user->avatar.'/uploads/8.jpg'}}"
                                   alt="" 
                                   height="50"  width="50" style = "border-radius:50%">
                      
                              @endif
                              </td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                   @if($user->admin)
                                   <a href="{{route('user.notadmin' , ['id'=> $user->id])}}"
                                   id="{{$user->id}}" class="btn btn-danger btn-sm">Remove Permissions</a>
                                   @else
                                   <a href="{{route('user.admin' , ['id'=> $user->id])}}"
                                   class="btn btn-warning btn-sm">Make Admin</a>
                                   @endif
                              </td>
                              <td><a href="{{route('user.delete' , ['id'=> $user->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                         </tr>
                         @endforeach
                    @else
                         <tr><th class="text-center" colspan="5">No trashed posts!</th></tr>
                    @endif
               </tbody>
          </table>
  
     </div>
</div>
@stop
