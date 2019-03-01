@extends('layouts.frontend')
@section('content')
        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">Tag: {{$tag->name}}</h1>
            </div>
        </div>
        <div class="container">
            <div class="row medium-padding120">
                <main class="main">
                    
                    <div class="row">
                                <div class="case-item-wrap">
                                    @if($tag->posts)
                                    @foreach($tag->posts as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{asset($post->img_path)}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="{{route('post.single',['slug'=>$post->slug])}}">{{$post->title}}</a>
                                        </div><br>
                                    </div>
                                    @endforeach
                                    @endif
                                    @if(count($tag->posts)==0)
                                    <h1 class="text-center">No results found!</h1>
                                    @endif
                                   
                                
                                    
                                </div>
                    </div>
        
                    <!-- End Post Details -->
                    <br>
                    <br>
                    <br>
                    <!-- Sidebar-->
        
                    
        
                    <!-- End Sidebar-->
        
                </main>
            </div>
        </div>
@endsection
                    