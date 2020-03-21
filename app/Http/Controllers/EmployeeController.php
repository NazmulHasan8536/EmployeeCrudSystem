<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class EmployeeController extends Controller
{



    public function index(){
        $category = DB::table('employees')->get();
        return view('employee.index',['employees' => $category]);
    }


    public function create(){
        return view('employee.create');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'department' => 'required|max:255|min:3',
            'salary' => 'required',
        ]);


        $data = array();
        $data['name'] = $request->name;
        $data['department'] = $request->department;
        $data['salary'] = $request->salary;

        // dd($data);

        $category = DB::table('employees')->insert($data);
        // dd($category);

        if($category){
            $notification = array(
                'message'=>'Successfully Category Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('Employee.index')->with($notification); 
        }else{
            $notification = array(
                'message'=>'Something Went wrong',
                'alert-type'=>'Error'
            );
            return Redirect()->back()->with($notification); 
        // return redirect()->route('home');
    }
}



// show 44


public function show($id){
    // dd($id);
    $employee = DB::table('employees')->where('id',$id)->first();
    return view('employee.view',compact('employee'));
    // dd($employee);
}

public function deleteEmployee($id){
    // dd($id);
    $employee = DB::table('employees')->where('id',$id)->delete();
    // dd($employee);
    return redirect()->route('Employee.index');
}




// edit Employee 

public function editEmployee($id){
   $employee = DB::table('employees')->where('id',$id)->first();
   return view('employee.edit',['employee' => $employee]);
}

// update employee 

public function updateEmployee(Request $request,$id){
    // dd($id);

    $request->validate([
        'name' => 'required|max:255|min:3',
        'department' => 'required|max:255|min:3',
        'salary' => 'required',
    ]);


    $data = array();
    $data['name'] = $request->name;
    $data['department'] = $request->department;
    $data['salary'] = $request->salary;

    // dd($data);

    $employee = DB::table('employees')->where('id',$id)->update($data);

    // dd($employee);
    return redirect()->route('Employee.index');
    



}
   
}
