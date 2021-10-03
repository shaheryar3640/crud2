@extends('layouts.app')
@section('page_title','Post')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('msg')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            @endif

            <div class="card">
                <div class="card-header font-weight-bold" style="font-size: 20px">My Blog <a href="{{route('admin.blogs.create')}}" class="btn btn-primary btn-sm float-right">Add Data</a></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" >#</th>
                            <th scope="col" class="col-md-8">Title</th>
                            <th scope="col" class="col-md-4">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $id=1;
                            @endphp
                            @foreach ($blogs as $blog)
                            <tr>
                                <th scope="row">{{$id++}}</th>
                                <td>{{$blog->title}}</td>
                                <td class="d-flex">
                                    <a href="{{route("admin.blogs.edit", $blog->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{route("admin.blogs.destroy", $blog->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
