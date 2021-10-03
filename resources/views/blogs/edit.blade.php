@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session()->has('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('msg')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            @endif

            <div class="card">
                <div class="card-header font-weight-bold text-center" style="font-size: 30px">Add Data</div>

                <div class="card-body">
                    <form method="POST" action="{{route('admin.blogs.update', $blog->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{$blog->id}}"  class="form-control">
                          <label for="" class="form-label">Title</label>
                          <input type="text" name="title" value="{{$blog->title}}"  class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea type="text" name="description"  class="form-control" required>{{$blog->description}} </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            @if ($blog->image!='')
                            <img src="{{ asset('/storage/blogs/'. $blog->image) }}" width="100px" height="100px" alt="">

                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
