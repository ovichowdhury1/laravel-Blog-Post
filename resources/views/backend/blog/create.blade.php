@extends('layouts.app')

@section('content')

     @if (session()->has('success'))
     <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
     @endif
                    <div class="card col-5 mx-auto shadow">
                        <div class="card-header bg-primary text-ligt">
                            <h3>Add Blog Post</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('post.store')}}" method="POST">
                                @csrf
                                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Blog Title" name="title" value="{{ old('title')}}">
                                  @error('title')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                                  <textarea class="form-control my-3" id="exampleFormControlTextarea1" placeholder="Blog Details" name="detail" value="{{ old('detail')}}"></textarea>
                                  @error('detail')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                  <button class="btn btn-primary w-100">Add Blog post</button>
                                </form>
                        </div>
                    </div>
@endsection
