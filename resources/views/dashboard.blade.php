@extends('layouts.admindefault')


@section('routes')
<a href="" class="nav-item nav-link"><i class="fas fa-user text-success"></i> My Profile</a>
<a href="{{route('dashboard',['adminid' => $admin->name])}}" class="nav-item nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
<a href="" class="nav-item nav-link">Posts</a>
<a href="{{route('addadmin', ['adminid' => $admin->name])}}" class="nav-item nav-link">Manage Admins</a>
<a href="" class="nav-item nav-link"><i class="fas fa-comments"></i> Comments</a>
@endsection

@section('logout')
<a href="{{route('adminlogout',['id' => $admin->id])}}" class="nav-item nav-link mr-auto text-danger"><i class="fas fa-user-times"></i> Logout</a>
@endsection

@section('page-content')
<section class="container py-2 mb-4">
        
            <div class="row">
                <!--LEFT SIDE AREA START-->
                <div class="col-lg-2 d-none d-md-block">
                    <div class="card text-center bg-dark text-white mb-3">
                        <div class="card-body">
                            <h1 class="lead">Posts</h1>
                            <h4 class="display-5">
                                <i class="fab fa-readme">
                                    {{$totalposts}}
                                </i>
                            </h4>
                        </div>
                    </div>
            
                    <div class="card text-center bg-dark text-white mb-3">
                        <div class="card-body">
                            <h1 class="lead">Admins</h1>
                            <h4 class="display-5">
                                <i class="fas fa-users">
                                    {{$totaladmins}}
                                </i>
                            </h4>
                        </div>
                    </div>
                    <div class="card text-center bg-dark text-white mb-3">
                        <div class="card-body">
                            <h1 class="lead">Comments</h1>
                            <h4 class="display-5">
                                <i class="fas fa-comments">
                                    {{$totalcomments}}
                                </i>
                            </h4>
                        </div>
                    </div>
                </div>
                <!--LEFT SIDE AREA END-->
                <!--RIGHT SIDE AREA START-->

                <div class="col-lg-10">
                    <h1>Top Posts</h1>
                    <table class="table table-striped table-hover bg-white text-dark">
                        <thead class="thead-dark">
                            
                            <th>No.</th>
                            <th>Title</th>
                            <th>Date&Time</th>
                            <th>Author</th>
                            <th>Likes</th>
                            <th>Comments</th>
                            <th>Details</th>
                        </thead>
                       
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$post->post}}</td>
                                <td>{{$post->created_at}}</td>
                                @foreach($users as $user)
                                @if($post->user_id === $user->id)
                                <td>{{$user->name}}</td>
                                @endif
                                @endforeach
                                <td>{{$post->likes}}</td>
                                <td>{{$post->comments}}</td>
                                <td>
                                    <a href="" target="_blank" class="btn btn-info">Preview</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!--RIGHT SIDE AREA END-->
            </div>
        </section>
@endsection