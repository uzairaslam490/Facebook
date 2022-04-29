@extends('layouts.default')

@section('routes')
<a href="{{route('login')}}" class="nav-link text-light">User</a>
@endsection

@section('header')
<header class="bg-dark text-white py-3">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><i class="fas fa-user" style="color: #27aae1;"></i> AdminLogin</h1>
        </div>
    </div>
</div>
</header>
@endsection

@section('page-content')
<section class="container py-2 mb-4">
            <div class="row">
                <div class="offset-sm-3 col-sm-6" style="min-height:550px;">
                <br><br><br>
                    @if(session()->has('message'))
                    <div class="mb-4">
                        <alert class="alert alert-danger form-control">{{session()->get('message')}}</alert>
                    </div>
                    @endif
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="mb-4">
                        <alert class="alert alert-danger form-control">{{$error}}</alert>
                    </div>
                    @endforeach
                    @endif
                    <div class="card bg-secondary text-light">
                        <div class="card-header">
                            <h1>Welcome Back!!</h1>
                        </div>
                        <div class="card-body bg-dark">
                        <form action="{{route('confirmadminlogin')}}"  method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name"><span class="FieldInfo">Username:</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-info"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password"><span class="FieldInfo">Password:</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-info"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div><br>
                            <input type="submit" name="Submit" class="btn btn-info btn-block" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection