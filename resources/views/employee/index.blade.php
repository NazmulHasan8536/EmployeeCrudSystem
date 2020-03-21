@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="employee mb-3">
                <a href="{{route('Employee.create')}}" class="btn btn-outline-primary">Add New Employee</a>
            </div>
       
            <div class="card">
                <div class="card-header">All Employess</div>



  <div class="card-body">
    <table>
        <tr>
          <th>Employee ID</th>
          <th>Employee Name</th>
          <th>Employee Department</th>
          <th>Employee Salary</th>
          <th>Action</th>
        </tr>

        <tbody>
            @foreach ($employees As $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->department}}</td>
                    <td>{{$employee->salary}}</td>
                    <td>
                    <a href="{{url('Employee/'.$employee->id)}}" class="btn btn-outline-primary">View</a>
                    <a href="{{url('Employeee/edit/'.$employee->id)}}" class="btn btn-outline-success">Edit</a>
                        <a href="{{url('Employee/delete/'.$employee->id)}}" class="btn btn-outline-danger">Delete</a>
                  
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
