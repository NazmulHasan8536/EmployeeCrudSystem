@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="row">
                        <div class="employee col-md-12 text-center">
                            <a href="{{route('Employee.create')}}" class="btn btn-outline-primary">Add New Employee</a>
                        </div>
                    
                </div>



                <div class="row mt-2">
                    <div class="employee col-md-6 text-left"> 
                        <a href="{{url('Employeee/edit/'.$employee->id)}}" class="btn btn-outline-success">Delete This Employee</a> 

                    </div> 
                    
                    <div class="employee col-md-6 text-right"> 
            
                         
                        <a href="{{url('Employee/delete/'.$employee->id)}}" class="btn btn-outline-danger">Delete This Employee</a>

                    </div> 
                    
                </div>
            
       
            <div class="card mt-2">
                <div class="card-header">All Employess</div>



  <div class="card-body">


 

    <dl>
        <dt>Employee Id:</dt>
        <dd>{{$employee->id}}</dd>
        <dt>Employee name:</dt>
        <dd> {{$employee->name}}</dd>
        <dt>Employee department:</dt>
        <dd>{{$employee->department}}</dd>
        <dt>Employee salary:</dt>
        <dd> {{$employee->salary}}</dd>
      </dl> 




</div>
</div>
</div>
</div>
</div>
@endsection
