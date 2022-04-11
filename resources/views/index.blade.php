@extends('layouts.default')

@section('routes')
<a href="{{route('timeline',['user' => 'Muhammad Uzair'])}}" class="nav-link text-light">Timeline</a>
<a href="{{route('createpost', ['id' => 1])}}" class="nav-link text-light">CreatePost</a>
@endsection

@section('page-content')
<div class="container mt-4 text-center" style="min-height: 533px;">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">

           <h2> Fetched Posts Goes here </h2>
            
        </div>
    </div>
@endsection