@extends('layouts.default')

@section('header')
<header class="bg-dark text-white py-3">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><i class="fas fa-users" style="color: #27aae1;"></i> Join Us</h1>
        </div>
    </div>
</div>
</header>
@endsection

@section('page-content')
<section class="container py-2 mb-4">
            <div class="row">
                <div class="offset-sm-3 col-sm-6" style="min-height:500px;">
                <br><br><br>
                    @if(session()->has('signup-success'))
                    <div class="mb-4">
                        <alert class="alert alert-success form-control">{{session()->get('signup-success')}}</alert>
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
                            <h1>Sign Up!!</h1>
                        </div>
                        <div class="card-body bg-dark">
                        <form action="{{route('confirmsignup')}}"  method="POST">
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
                                <label for="email"><span class="FieldInfo">Email:</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-info"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" name="email" id="email" class="form-control">
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
                            <button type="submit" name ="Submit" class="btn btn-success btn-block"><i class="fas fa-user"></i> Sign Up</button>
                        </form>
                        <span style="float:left;">Already have an account? <a href="{{route('login')}}">Login</a></span>
                    </div>
                </div>
            </div>
        </section>
@endsection