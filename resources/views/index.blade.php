@extends('layouts.default')

@foreach($user as $u)
@section('routes')
<a href="{{route('timeline',['userid' => $u->id ])}}" class="nav-link text-light">Timeline</a>
<a href="{{route('createpost', ['id' => $u->id ])}}" class="nav-link text-light">CreatePost</a>
@endsection
@endforeach
@section('page-content')

<div class="container mt-4 text-center" style="min-height: 533px;">
    <div class="row">
    @if(session()->has('user'))
        <alert class="alert alert-success form-control">Welcome back {{session()->get('user')}} !!</alert>
    @endif
        <div class="offset-lg-1 col-lg-10">

           <h2> Fetched Posts Goes here </h2>
            
        </div>
    </div>
@endsection