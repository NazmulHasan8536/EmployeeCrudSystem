@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                <h2 class="card-header text-center text-success text-bold text-uppercase" style="font-family:tahoma;">Edit Post</h2>

                <div class="card-body">
                <form method="POST" action="{{url('post/update/'.$posts->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="employee">Employee Name</label>
                            <div class="employee col-md-6 text-center"> 
                                
                                <select name="employee_id" id="employee" class="form-control">
                                @foreach ($employees as $row)
                                    <option value="{{$row->id}}" <?php if($posts->employee_id == $row->id){echo 'selected';} ?> >{{$row->name}}</option>
                                
                                @endforeach
                                
                            </select>
                            </div> 
                            

                        </div>



                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Post Title</label>

                            <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{$posts->title}}">

                               
                            </div>
                        </div>


                       

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Post Image</label> 

                            <div class="col-md-6">
                            Old Image: <img src="{{URL::to($posts->image)}}" style="margin-bottom:2px; height:60px;width:100px;" alt="">

                            <input id="image" type="file" class="form-control" name="image" value="" >
                            <input id="image" type="hidden" class="form-control" name="old_image" value="{{$posts->image}}" >

                                
                            </div> 
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-md-4 col-form-label text-md-right">Details</label>

                            <div class="col-md-6">
                               <input type="text" id="details" class="form-control" name="details" value="{{$posts->details}}">
                               
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection