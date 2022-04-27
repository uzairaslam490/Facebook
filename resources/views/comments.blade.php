@extends('layouts.default')

@section('routes')
<a href="{{route('timeline',['userid' => $user->name ])}}" class="nav-link text-light">Timeline</a>
<a href="{{route('createpost', ['id' => $user->id ])}}" class="nav-link text-light">CreatePost</a>
<a href="{{route('logout',['id' => $user->id])}}" class="nav-item nav-link ml-5 text-danger"><i class="fas fa-user-times"></i> Logout</a>
@endsection

@section('page-content')
<h4>Comments</h4>
@if(session()->has('comment_success'))
    <alert class="alert alert-success form-control">{{session()->get('comment_success')}}</alert>
@endif
@if(session()->has('comment_deleted'))
    <alert class="alert alert-success form-control">{{session()->get('comment_deleted')}}</alert>
@endif
@if($errors->any())
@foreach($errors->all() as $error)
<div class="mb-4">
    <alert class="alert alert-danger form-control">{{$error}}</alert>
</div>
@endforeach
@endif
                <br><br>
                @foreach($comments as $comment)
                <div>
                    <div class="media CommentBlock">
                        <img class="d-block img-fluid align-self" src="{{ asset('images')}}/Commentor.png" width="100px" height="100px">
                        <div class="media-body ml-2">
                            <h6 class="lead">{{$comment->name}}</h6>
                            <p class="small">{{$comment->created_at}}</p>
                            <p>{{$comment->comment}}</p>
                            <a href="{{route('deletecomment',['id' => $comment->id ])}}">Delete</a>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
                <!--Fetching Existing Comment END-->
               <div class=""> 
                    <form action="{{route('addcomment', ['id' => $post->id, 'userid' => $user->id])}}" method="POST">
                        @csrf
                            <div class="card mb-3 bg-dark text-white">
                                <div class="card-header">
                                    <h5>Share your thoughts about this post.</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" disabled name="name" placeholder="Name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" disabled name="email" placeholder="Email" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control" cols="80" rows="6"></textarea>
                                    </div>
                                    <div class="">
                                        <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
@endsection