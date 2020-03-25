@extends('layouts.app')


@section('content')

    <div class="container">


        <div class="card mb-3">

            <h2 class="card-title">Employee Name: {{$post->name}}</h2>
        <img src="{{URL::to($post->image)}}" class="card-img-top" style="height:500px;width:800px;" alt="...">
            <div class="card-body">
            <h5 class="card-title">Post Title: {{$post->title}}</h5>

            <p class="card-text"><small class="text-muted">Post Description</small></p>
            <p class="card-text">{{$post->details}}</p>
            </div>
          </div>
       


    </div>


@endsection