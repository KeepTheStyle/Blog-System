@extends('layouts.app')

@section('content')
<h1 class="text-center bg-dark pt-2 pb-3 text-white">DASHBOARD</h1>
<div class="container mt-5">
    <div class="row">

            <div class="col-lg-3">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header text-center text-lg"><h3>Posts</h3></div>
                    <div class="card-body">
                      <h1 class="card-title text-center">{{count($posts)}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center text-lg"><h3>Users</h3></div>
                        <div class="card-body">
                          <h1 class="card-title text-center">{{$users}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center text-lg"><h3>Categories</h3></div>
                            <div class="card-body">
                              <h1 class="card-title text-center">{{$categories}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center text-lg"><h3>Trashed Posts</h3></div>
                                <div class="card-body">
                                  <h1 class="card-title text-center">{{$trashed}}</h1>
                                </div>
                            </div>
                        </div>

    </div>
    
</div>
@endsection
