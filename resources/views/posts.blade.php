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
                    <th>Title</th>
                    <th>Date&Time</th>
                    <th>Author</th>
                    <th>Banner</th>
                    <th>Comments</th>
                    <th>Action</th>
                    <th>Live Preview</th>
                </tr>
                </thead>
                        
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post->post}}</td>
                    <td>{{$post->created_at}}</td>
                    @foreach($users as $user)
                    @if($user->id === $post->user_id)
                    <td>{{$user->name}}</td>
                    @endif
                    @endforeach
                    <td><img src="{{ asset('images')}}/{{ $post->image }}" width="170px" height="60px"></td>
                    <td>{{$post->comments}}</td>
                    <td>
                        <a href="{{route('deletepost',['id' => $post->id ])}}">
                            <span class="btn btn-danger">Delete</span>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('fullpost',['adminid' => $admin->name,'id' => $post->id])}}" target="_blank">
                            <span class="btn btn-primary">Live Preview</span>
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