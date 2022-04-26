@extends('layouts.default')


@section('routes')
<a href="{{route('timeline',['userid' => $user->name ])}}" class="nav-link text-light">Timeline</a>
<a href="{{route('createpost', ['id' => $user->id ])}}" class="nav-link text-light">CreatePost</a>
<a href="{{route('logout',['id' => $user->id])}}" class="nav-item nav-link ml-5 text-danger"><i class="fas fa-user-times"></i> Logout</a>
@endsection

@section('page-content')
<div class="container mt-4" style="min-height: 533px;">
    <div class="row">
    @if(session()->has('user'))
        <alert class="alert alert-success form-control">Welcome back {{session()->get('user')}} !!</alert>
    @endif
    @if(session()->has('postdeleted_success'))
        <alert class="alert alert-success form-control">{{session()->get('postdeleted_success')}} !!</alert>
    @endif
    @if(session()->has('followeduser_success'))
        <alert class="alert alert-success form-control">{{session()->get('followeduser_success')}} !!</alert>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="mb-4">
        <alert class="alert alert-danger form-control">{{$error}}</alert>
    </div>
    @endforeach
    @endif
        <div class="col-sm-8">
        @foreach($posts as $post)
            <div class="card mb-4 bg-dark text-white">
                <h3 class="card-header"><span class="ml-1">{{$post->post}}</span>
                    <button class="btn btn-secondary btn-sm dropdown-toggle" style="float:right;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('deletepost',['id' => $post->id ])}}">Delete Post</a>
                    </div>
                </h3>
                <img src="{{ asset('images')}}/{{ $post->image }}" style="max-height:450px; max-width:450px" class="img-fluid card-img-top">
                <div class="card-body">
                    <h4 class="card-title">
                        Posted by:
                        <span class="ml-1 mr-1">{{$user->name}}</span> at
                        <span class="ml-2 mr-2">{{$post->created_at}}</span>
                    </h4>
                   
                    <a href="{{route('comments', ['id' => $post->id])}}"><span style="float: right;" class="badge badge-dark text-light"><i class="fas fa-comments"></i>Comment
                    {{$post->comments}}        
                    </span></a>
                    
                    @if($post->likedposts->Liked === 'No' && $post->user_id === $post->likedposts->user_id)
                    <a href="{{route('likepost', ['id' => $post->id])}}"><span style="float: right;" class="badge badge-dark text-light"><i class="fas fa-thumbs-up"></i>Like
                    {{$post->likes}}         
                    </span></a>
                    <hr>
                    @elseif($post->likedposts->Liked === 'Yes' && $post->user_id === $post->likedposts->user_id)
                    <a href="{{route('timeline', ['userid' => $user->name])}}"><span style="float: right;" class="badge badge-dark text-light"><i class="fas fa-thumbs-up"></i>Like
                    {{$post->likes}}         
                    </span></a>
                    <hr>
                    @endif
                </div>
            </div>
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
                @if($PeopleYouMayKnow->followeduser->followed === 'No')
                <img src="{{ asset('images')}}/Commentor.png" class="d-block img-fluid align-self-start" width="90" height="90">
                <h4>{{$PeopleYouMayKnow->name}}</h4>
                <a 
                href="{{route('followed',
                    ['id' => $PeopleYouMayKnow->followeduser->followeduser_id,
                     'userid'=> $user->id])}}" 
                class="btn btn-primary btn-sm">
                Follow
                </a>
                <br><br>
                @endif
                @endforeach
            </div>
        </div><hr>
        </div>
    </div>
</div>
@endsection