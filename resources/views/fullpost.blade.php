@extends('layouts.admindefault')

@section('page-content')
<section class="container py-2 mb-4">
        
<div class="row">
<div class="col-lg-10 d-none d-md-block">
<div class="card mb-4 bg-dark text-white">
    <h3 class="card-header"><span class="ml-1">{{$post->post}}</span></h3>
        <img src="{{ asset('images')}}/{{ $post->image }}" style="max-height:450px; max-width:450px" class="img-fluid card-img-top">
        <div class="card-body">
        <h4 class="card-title">
            Posted by:
            <span class="ml-1 mr-1">{{$post->user->name}}</span> at
            <span class="ml-2 mr-2">{{$post->created_at}}</span>
        </h4>
                   
        <span style="float: right;" class="badge badge-dark text-light"><i class="fas fa-comments"></i>Comment
            {{$post->comments}}        
        </span>
        <span style="float: right;" class="badge badge-dark text-light"><i class="fas fa-thumbs-up"></i>Like
            {{$post->likes}}         
        </span></a>
        <hr>
</div>
<h4>Comments</h4>
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
</div>
</div>
</section>
@endsection