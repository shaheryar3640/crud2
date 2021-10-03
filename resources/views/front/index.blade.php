@extends('front.layout')
@section('container')
<div class="col-md-10 mt-5">
    @foreach ($blogs as $blog)
    <div class="card">
        <div class="card-header font-weight-bold" style="font-size: 25px;cursor: pointer;">
            <a href="{{route("front.blogs.detail", $blog->id)}}" class="card-link" style="color: black">{{$blog->title}}</a>
        </div>
        <div class="card-body">
            <img src="{{asset('/storage/blogs/'.$blog->image)}}" width="200px" height="400px" class="card-img-top" alt="...">
        <p class="card-text">{{ Illuminate\Support\Str::limit($blog->description, 200) }}</p>

        </div>
    </div>
    @endforeach
</div>
@endsection
