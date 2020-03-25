<?php

namespace App\Http\Controllers;

use App\Post;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('posts')
                ->join('employees','posts.employee_id','employees.id')
                ->select('posts.*','employees.name')
                ->get();
                // return response($data);
        // return view('post.index');
        return view('post.index',['posts'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $employee = DB::table('employees')->get();
        return view('post.create',compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'title' => 'required|unique:posts|max:25|min:4',
            'details' => 'required|min:4',
            'image' => 'required | mimes:jpeg,jpg,png,JPG,PNG,JPEG | max:1000',
        ]);
        
        $data = array();
        $data['employee_id'] = $request->employee_id;
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $data['title'] = $request->title;

        // image upload part 
        $image=$request->file('image'); //ইমেজ ধরব এখানে input এর নাম image 

            if($image){

                // ডাটা ফোল্ডার এ ইন্সারট করার জন্য 

                $image_name = hexdec(uniqid()); // একটা random নামের জন্য ।
                $ext = strtolower($image->getClientOriginalExtension()); // member function সকল ডাটা ছোট হাতের করার জন্য ।
                $image_full_name = $image_name.'.'.$ext; //conket কিংবা যোগ করার জন্য ।
                $upload_path = 'public/frontend/image/' ;  // Image Path , অবশ্যই শেষে '/' দিতে হবে ।
                $image_url = $upload_path.$image_full_name; // Image url টা আপলোড করে url store করে দিলাম ।
                $success=$image->move($upload_path,$image_full_name); //Image path দিয়ে , image er ফুল্ল নাম দিয়ে move করলাম ।

                $data['image'] = $image_url; //$data['image'] হল ডাটাবেস এর ফিল্ড , $image_url holo iage path dekhano .
                
             DB::table('posts')->insert($data);

            //  dd($data);
            // return response($data);
            $notification = array(
                'message' => 'Data Inserted Successfully',
                'alert-type' =>'success'
            );
            return redirect()->route('IndexPost')->with($notification);
        }else{
            DB::table('posts')->insert();
            $notification = array(
                'message' => 'Data Inserted Successfully',
                'alert-type' =>'success'
            );
            return redirect()->route('IndexPost')->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function view($id){
        // dd($id);
        $data = DB::table('posts')
                ->join('employees','posts.employee_id','employees.id')
                ->where('posts.id',$id)
                ->select('posts.*','employees.name')
                ->first();
        // return response()->json();
        // return response()->json($data);
        return view('post.view',['post'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,$id)
    {
        // dd($id);
        $employee = DB::table('employees')->get();
        $post = DB::table('posts')->where('id',$id)->first();
        return view('post.edit',['employees' => $employee, 'posts' =>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */


    //  Update 
    public function update(Request $request, Post $post,$id)
    {
        // dd($id);


        // validation 
        $request->validate([
            'title' => 'required|unique:posts|max:50|min:4',
            'details' => 'required|min:4',
            'image' => 'mimes:jpeg,jpg,png,JPG,PNG,JPEG | max:1000',
        ]);
        
        $data = array();
        $data['employee_id'] = $request->employee_id;
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $data['title'] = $request->title;

        // image upload part 
        $image=$request->file('image'); //ইমেজ ধরব এখানে input এর নাম image 

            if($image){

                // ডাটা ফোল্ডার এ ইন্সারট করার জন্য 

                $image_name = hexdec(uniqid()); // একটা random নামের জন্য ।
                $ext = strtolower($image->getClientOriginalExtension()); // member function সকল ডাটা ছোট হাতের করার জন্য ।
                $image_full_name = $image_name.'.'.$ext; //conket কিংবা যোগ করার জন্য ।
                $upload_path = 'public/frontend/image/' ;  // Image Path , অবশ্যই শেষে '/' দিতে হবে ।
                $image_url = $upload_path.$image_full_name; // Image url টা আপলোড করে url store করে দিলাম ।
                $success=$image->move($upload_path,$image_full_name); //Image path দিয়ে , image er ফুল্ল নাম দিয়ে move করলাম ।

                $data['image'] = $image_url; //$data['image'] হল ডাটাবেস এর ফিল্ড , $image_url holo iage path dekhano .
                
                unlink($request->old_image);
             DB::table('posts')->where('id',$id)->update($data);

            //  dd($data);
            // return response($data);
            $notification = array(
                'message' => 'Data Updated Successfully',
                'alert-type' =>'success'
            );
            return redirect()->route('IndexPost')->with($notification);
        }else{
            $data['image'] = $request->old_image;
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Data Updated Successfully',
                'alert-type' =>'success'
            );
            return redirect()->route('IndexPost')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $posts,$id)
    {
        // dd($id);
        $posts = DB::table('posts')->where('id',$id)->first();
        $image = $posts->image;
        $data = DB::table('posts')->where('id',$id)->delete();
        if($data){
            unlink($image);
            $notification = array(
                'message' => 'Data Updated Successfully',
                'alert-type' =>'success'
            );
            return redirect()->route('IndexPost')->with($notification);
       
        }else{
            $data['image'] = $request->old_image;
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Data Deleted Successfully',
                'alert-type' =>'success'
            );
            return redirect()->route('IndexPost')->with($notification);
       
        }

    }
}
