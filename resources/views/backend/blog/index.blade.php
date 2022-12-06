@extends('layouts.app')

@section('content')
   @if(session()->has('success'))
   <div class="alert alert-success" role="alert">
       {{session('success')}}
  </div>
   @endif
   <div class="col-lg-8 mx-auto mt-5 table-responsiveS">
    <table class="table table-responsive text-center">
          <tr class="bg-primary text-light">
            <td>#</td>
            <td>Post Title</td>
            <td>Post Details</td>
            <td>Status</td>
            <td>Created At</td>
            <td>Updated At</td>
            <td>Actions</td>
          </tr>
       @forelse ($posts as $key=>$post)
          <tr>
            <td>{{++$key}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->detail}}</td>
            <td>{{$post->status==0 ? 'Active': 'Deactive'}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            <td>
              <a href="{{route('post.edit',$post->id)}}" class="btn btn-sm btn-primary">Edit</a>
              <a href="#" class="btn btn-sm btn-warning">Status</a>
              <form action="{{route('post.delete',$post->id)}}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                  <button class="btn btn-sm btn-danger">Delete</button>
              </form>
            </td>
          </tr>
       @empty
          <tr>
            <td colspan="6">No post yet</td>
          </tr>
       @endforelse
      </table>

   </div>
@endsection
