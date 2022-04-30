@extends('layouts.admindefault')


@section('routes')
<a href="" class="nav-item nav-link"><i class="fas fa-user text-success"></i> My Profile</a>
<a href="{{route('dashboard',['adminid' => $admin->name])}}" class="nav-item nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
<a href="{{route('posts', ['adminid' => $admin->name])}}" class="nav-item nav-link">Posts</a>
<a href="{{route('addadmin', ['adminid' => $admin->name])}}" class="nav-item nav-link">Manage Admins</a>
<a href="{{route('tablecomments', ['adminid'=> $admin->name])}}" class="nav-item nav-link"><i class="fas fa-comments"></i> Comments</a>
@endsection

@section('logout')
<a href="{{route('adminlogout',['id' => $admin->id])}}" class="nav-item nav-link mr-auto text-danger"><i class="fas fa-user-times"></i> Logout</a>
@endsection

@section('page-content')
<section class="container py-2 mb-4">
    <div class="row">
        <div class="col-lg-12">
                
            <table class="table table-striped table-hover bg-white text-dark">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Comment</th>
                    <th>Date&Time</th>
                    <th>Author</th>
                    <th>Post</th>
                    <th>Action</th>
                </tr>
                </thead>
                        
                <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->created_at}}</td>

                    @foreach($users as $user)
                    @foreach($posts as $post)
                    @if($comment->post_id === $post->id)
                    @if($post->user_id === $user->id)
                    <td>{{$user->name}}</td>
                    @endif
                    @endif
                    @endforeach
                    @endforeach

                    @foreach($posts as $post)
                    @if($comment->post_id === $post->id)
                    <td>{{$post->post}}</td>
                    @endif
                    @endforeach
                    <td>
                        <a href="{{route('deletecomment',['id' => $comment->id ])}}">
                            <span class="btn btn-danger">Delete</span>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection