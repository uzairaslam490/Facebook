@extends('layouts.default')

@section('page-content')
<section class="container py-2 mb-4">
            <div class="row">
                <div class="offset-sm-3 col-sm-6" style="min-height:500px;">
                <br><br><br>
                    <div class="card bg-secondary text-light">
                        <div class="card-header">
                            <h1>Welcome Back!!</h1>
                        </div>
                        <div class="card-body bg-dark">
                        <form action="Login.php"  method="POST">
                            <div class="form-group">
                                <label for="username"><span class="FieldInfo">Username:</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-info"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="Username" id="username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username"><span class="FieldInfo">Email:</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-info"><i class="fas fa-mail"></i></span>
                                    </div>
                                    <input type="text" name="Email" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password"><span class="FieldInfo">Password:</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white bg-info"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" name="Password" id="password" class="form-control">
                                </div>
                            </div>
                            <input type="submit" name="Submit" class="btn btn-info btn-block" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection