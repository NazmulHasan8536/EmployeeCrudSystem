@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">



            <div class="card">


                <h2 class="card-header text-center text-success text-bold text-uppercase" style="font-family:tahoma;">Create Employee</h2>
                 {{-- alert  --}}

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


                {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                <div class="card-body">
                <form method="POST" action="{{route('Employee.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Employee Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="">

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Department</label>

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department" value="" >

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-md-4 col-form-label text-md-right">Salary</label>

                            <div class="col-md-6">
                               <input type="text" id="salary" class="form-control" name="salary">
                               
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