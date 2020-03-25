@extends('layouts.app')

@section('content')





<div class="container">


  <div class="row">
    <div class="employee mb-4 col-md-6 text-left">
      <a href="{{route('Employee.index')}}" class="btn btn-outline-dark">All Employees</a>
  </div>
    <div class="employee mb-4 col-md-6 text-right">
        <a href="{{route('CreatePost')}}" class="btn btn-outline-primary">Add New Post</a>
    </div>
    
</div>
    


    <div class="row row-cols-1 row-cols-md-3">

        @foreach ($posts as $post)
            
        

        <div class="col mb-4">
          <div class="card">
            
            <img src="{{URL::to($post->image)}}" style="height:400px;" alt="">
            <div class="card-body">
            <h5 class="card-title">Employee Name : {{$post->name}}</h5>
            <p class="card-text text-bolder">Post Title: {{$post->title}}</p>
            <p class="card-text">{{$post->details}}</p>
            <div class="row">
                <div class="col-md-4">
                <a href="{{url('post/view/'.$post->id)}}" class="btn btn-outline-primary">view</a>
                </div>
                <div class="col-md-4">
                <a href="{{url('post/edit/'.$post->id)}}" class="btn btn-outline-success">Edit</a>
                </div>
                <div class="col-md-4">
                <a href="{{url('post/delete/'.$post->id)}}" class="btn btn-outline-danger">Delete</a>
                </div>
            </div>
            </div>
          </div>
        </div>

        @endforeach
      </div>
      </div>

@endsection