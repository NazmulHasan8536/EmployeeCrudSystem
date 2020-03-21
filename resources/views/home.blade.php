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
                        </tr>

                        <tbody>
                            @foreach ($employees As $e)
                        <tr>
                            <td></td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
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
