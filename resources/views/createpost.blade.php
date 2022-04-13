@extends('layouts.default')

@foreach($user as $u)
@section('routes')
<a href="{{route('timeline',['userid' => $u->id])}}" class="nav-link text-light">Timeline</a>
<a href="{{route('createpost', ['id' => $u->id])}}" class="nav-link text-light">CreatePost</a>
@endsection

@section('page-content')
<div class="container mt-4" style="min-height: 533px;">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
        @if(session()->has('post_success'))
            <div class="mb-4">
                <div class="alert alert-success form-control">
                    {{session()->get('post_success')}}
                </div>
            </div>
        @endif
            <h2>Create a post</h2>
            <form action="{{route('addpost', ['id' => $u->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="custom-file">
                        <input class="custom-file-input" type="File" name="image" id="ImageSelect" value="">
                        <label for="ImageSelect" class="custom-file-label">Select Image</label>
                    </div>
                </div>
                <textarea name="post" id="post" cols="30" rows="10" class="form-control" placeholder="Something on your mind..."></textarea>
                <button type="Submit" name="Submit" class="btn btn-primary form-control" style="float: left">Post</button>
            </form>
            <br>
            
            </div>
        </div>
    </div>
    @endforeach
@endsection