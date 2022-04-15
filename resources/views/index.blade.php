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
        <div class="col-sm-8">
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
                    0        
                    </span></a>
                    <a href=""><span style="float: right;" class="badge badge-dark text-light"><i class="fas fa-thumbs-up"></i>Like
                    0         
                    </span></a>
                    <hr>
                </div>
            </div>
        @endforeach
        @endforeach
        </div>
        <div class="col-sm-4">
        <div class="card mt-4 bg-dark">
            <div class="card-body">
                <img src="{{ asset('images')}}/Blog.jpg " class="d-block img-fluid mb-3" alt="">
                <div class="text-center">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header bg-info text-white">
                <h2 class="lead">People you may know</h2>
            </div>
            <div class="card-body bg-dark">
                @foreach($UsersNotFollowed as $PeopleYouMayKnow)
                <img src="{{ asset('images')}}/Commentor.png" class="d-block img-fluid align-self-start" width="90" height="90">
                <h4>{{$PeopleYouMayKnow->name}}</h4>
                <button type="Submit" name ="Submit" class="btn btn-primary btn-sm">Follow</button>
                <br><br>
                @endforeach
            </div>
        </div><hr>
        </div>
    </div>
</div>
@endsection