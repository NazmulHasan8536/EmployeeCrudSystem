@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                <h2 class="card-header text-center text-success text-bold text-uppercase" style="font-family:tahoma;">Create Post</h2>

                <div class="card-body">
                <form method="POST" action="{{route('StorePost')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="employee">Employee Name</label>
                            <div class="employee col-md-6 text-center"> 
                                
                                <select name="employee_id" id="employee" class="form-control">
                                @foreach ($employee as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                
                                @endforeach
                                
                            </select>
                            </div> 
                            

                        </div>



                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Post Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="">

                               
                            </div>
                        </div>


                       

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Post Image</label> 

                            <div class="col-md-6 text-center">
                                <input id="image" type="file" class="form-control" name="image" value="" required>

                                
                            </div> 
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-md-4 col-form-label text-md-right">Details</label>

                            <div class="col-md-6">
                               <input type="text" id="details" class="form-control" name="details">
                               
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection