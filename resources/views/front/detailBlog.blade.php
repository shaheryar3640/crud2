@extends('front.layout')
@section('container')
<div class="col-md-10 mt-5">
    <div class="card">
        <div class="card-header font-weight-bold" style="font-size: 25px;cursor: pointer;">
            <a href="" style="color: black;cursor: pointer;">{{$blog->title}}</a>
        </div>
        <div class="card-body">
            <img src="{{asset('/storage/blogs/'.$blog->image)}}" width="200px" height="400px" class="card-img-top" alt="...">
        <p class="card-text">{{$blog->description}}</p>

        </div>
    </div>
</div>
@endsection
