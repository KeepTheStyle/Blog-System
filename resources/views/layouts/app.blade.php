<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>{{ config('app.name', 'Laravel') }}</title>
        
            <!-- Scripts -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}" defer></script>
            <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}" defer></script>
            <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css">
            <script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>


        
            <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

            <!-- Styles -->
            <link href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="http://blog-system.test/css/style.css">
            <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
            @yield('styles')


        </head>
        <body>
            <nav class="navbar navbar-expand-md navbar-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <?php
                        use App\Setting;
                        $setting = Setting::first();
                                    
                    
                    if(Auth::check() && Auth::user()->profile && Auth::user()->profile->avatar ){
                        $profile = Auth::user()->profile->avatar;
                        $name = Auth::user()->name;
                    }
                    elseif(Auth::check() && Auth::user()->profile){
                        $name = Auth::user()->name;
                        $profile = 'uploads\8.jpg';
                        
                    }
                    else{
                        $name = 'Guest';
                        $profile = 'uploads\8.jpg';
                    }
                    ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="container-fluid">
                        <div class="row">
                            @if(Auth::check())
                            <div class="col-lg-3 custom-sidebar">
                                <a class="navbar-brand bottom-border text-center text-light mx-auto d-block mb-4 py-3" href="{{ url('/') }}">
                                    
                                   <h1> {{$setting->site_name}}</h1>
                                </a>
                                <div class="bottom-border pb-3">
                                    
                                    
                                    <img src="{{asset($profile)}}" alt="" width="50" height="50" class="rounded-circle mr-4">
                                <a href="{{route('profile.edit')}}" class="text-white">{{$name}}</a>
                                    
                                </div>
                                <div class="bottom-border pb-3">
                                    <ul class="navbar-nav flex-column mt-4">
                                    <li class="nav-item"><a href="{{ route('logout') }}" class="  nav-link sidebar-link p-3  text-white">
                                        <i class="fa fa-power-off text-danger mr-3 fa-lg" ></i>
                                     {{ __('Logout') }}</a></li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                     </form>
                                </div>
                                <ul class="navbar-nav flex-column mt-4 pb-3">
                                    <li class="nav-item"><a href="{{route('home')}}" class="  nav-link current p-3 text-white"> <i class="fa fa-home mr-3 fa-lg" ></i> Home</a></li>
                                    <li class="nav-item"><a href="{{route('post.create')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-file mr-3 fa-lg" ></i> Create posts</a></li>
                                    <li class="nav-item"><a href="{{route('posts')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-list-alt mr-3 fa-lg" ></i> View my posts</a></li>
                                    <li class="nav-item"><a href="{{route('post.trashed')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-chain-broken mr-3 fa-lg" ></i> View my trashed posts</a></li>
                                    <li class="nav-item"><a href="{{route('tags')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-tags mr-3 fa-lg" ></i> View My Tags</a></li>
                                    <li class="nav-item"><a href="{{route('tag.create')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-tag mr-3 fa-lg" ></i> Create new tag</a></li>
                                    <li class="nav-item"><a href="{{route('profile.edit')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-street-view mr-3 fa-lg" ></i> My Profile</a></li>
                                </ul>
                                <?php if(Auth::check() && Auth::user()->admin){?> 
                                <div class="bottom-border top-border pb-3 pt-3  text-center text-white">
                                    <h1 class="bg-success pb-3 pt-2">Admin Area</h1>
                                    
                                        
                                </div>
                                <ul class="navbar-nav flex-column mt-4">
                                           
                                        <li class="nav-item"><a href="{{route('allposts')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-list-alt mr-3 fa-lg" ></i> View all posts</a></li>
                                        <li class="nav-item"><a href="{{route('allpost.trashed')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-chain-broken mr-3 fa-lg" ></i> View trashed posts</a></li>
                                        <li class="nav-item"><a href="{{route('category.create')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-plus-circle mr-3 fa-lg" ></i> Create Categories</a></li>
                                        <li class="nav-item"><a href="{{route('categories')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-lg mr-3 fa-eye" ></i> View Categories</a></li>
                                        <li class="nav-item"><a href="{{route('alltags')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-tags mr-3 fa-lg" ></i> View All Tags</a></li>
                                        <li class="nav-item"><a href="{{route('user.index')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-users mr-3 fa-lg" ></i> View users</a></li>
                                        <li class="nav-item"><a href="{{route('user.create')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-user mr-3 fa-lg" ></i> Create new user</a></li>
                                        <li class="nav-item"><a href="{{route('setting.edit')}}" class="  nav-link sidebar-link p-3  text-white"><i class="fa fa-gear mr-3 fa-lg" ></i> Site Settings</a></li>  
                                        <?php } ?> 
                                </ul>  

                                    
                                    
                                    
                                    
                                         
                                
                        
                            </div>
                        
                            <div class="col-lg-9  ml-auto py-2"> 
                            @yield('content')
                            
                            </div>
                            
                        </div>
                        
                    </div>
                    @else
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6"> @yield('content')</div>
                            <div class="col-lg-3"></div>
                        </div>
                            @endif

                    </div>
                    
                        
                </div>
            </nav>
                
                        

                <script>
                $(function(){
                @if(Session::has('success'))
                    
                toastr.success("{{ Session::get('success') }}");
                
                @endif
                @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}");
                @endif
                });
            
                    </script>
            @yield('scripts')
        </body>

    </html>
