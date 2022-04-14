@extends('layouts.default')

@foreach($user as $u)
@section('routes')
<a href="{{route('timeline',['userid' => $u->id ])}}" class="nav-link text-light">Timeline</a>
<a href="{{route('createpost', ['id' => $u->id ])}}" class="nav-link text-light">CreatePost</a>
@endsection

@section('page-content')
<div class="container mt-4" style="min-height: 533px;">
    <div class="row">
    @if(session()->has('user'))
        <alert class="alert alert-success form-control">Welcome back {{session()->get('user')}} !!</alert>
    @endif
        <div class="offset-lg-1 col-lg-10">
    @foreach($posts as $post)
            <div class="card mb-4 bg-dark text-white">
                <h3 class="card-header"><span class="ml-1">{{$post->post}}</span></h3>
                <img src="{{ asset('images')}}/{{ $post->image }}" style="max-height:450px; max-width:450px" class="img-fluid card-img-top">
                <div class="card-body">
                    <h4 class="card-title">
                        Posted by:
                        <span class="ml-1 mr-1">{{$u->name}}</span> at
                        <span class="ml-2 mr-2">{{$post->created_at}}</span>
                    </h4>
                    <a href=""><span style="float: right;" class="badge badge-dark text-light"><i class="fas fa-comments"></i>Comment
                                    
                    </span></a>
                    <a href=""><span style="float: right;" class="badge badge-dark text-light"><i class="fas fa-thumbs-up"></i>Like
                                    
                    </span></a>
                    <hr>
                </div>
            </div>
        @endforeach
        @endforeach
        </div>
    </div>
</div>
@endsection