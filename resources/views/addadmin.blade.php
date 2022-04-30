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
                <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
                @if(session()->has('confirm_password'))
                    <alert class="alert alert-danger form-control">{{session()->get('confirm_password')}}</alert>
                @endif
                @if(session()->has('adminadded'))
                    <alert class="alert alert-success form-control">{{session()->get('adminadded')}}</alert>
                @endif
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="mb-4">
                            <alert class="alert alert-danger form-control">{{$error}}</alert>
                        </div>
                    @endforeach
                @endif
                    <form action="{{route('newadmin')}}" method="POST">
                        @csrf
                        <div class="card bg-secondary text-light mb-3">
                            <div class="card-header">
                                <h1>Add New Admin</h1>
                            </div>
                            <div class="card-body bg-dark">
                                <div class="form-group">
                                    <label for="username"><span class="FieldInfo">Username: </span></label>
                                    <input class="form-control" type="text" name="Username" id="username" value="">
                                </div>
                                <div class="form-group">
                                    <label for="email"><span class="FieldInfo">Email: </span></label>
                                    <input class="form-control" type="email" name="Email" id="email" value="">
                                </div>
                                <div class="form-group">
                                    <label for="Password"><span class="FieldInfo">Password: </span></label>
                                    <input class="form-control" type="password" name="Password" id="password" value="">
                                </div>
                                <div class="form-group">
                                    <label for="ConfirmPassword"><span class="FieldInfo">Confirm Password: </span></label>
                                    <input class="form-control" type="password" name="ConfirmPassword" id="ConfirmPassword" value="">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <a href="{{route('dashboard',['adminid' => $admin->name])}}" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <button type="submit" name="Submit" class="btn btn-success btn-block">
                                            <i class="fas fa-user"></i> Sign Up
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
        </section>
@endsection