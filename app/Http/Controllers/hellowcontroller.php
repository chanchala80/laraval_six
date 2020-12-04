<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class hellowcontroller extends Controller
{
   public function contact()
   {
   	return view('pages.contact');
   }

   public function about()
   {
   	return view('pages.about');
   }

 
   public function addcategory()
   {
 	return view('pages.addcategory');
   }

    public function storecategory(Request $request)
   {

        $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',
        'slug' => 'required|unique:categories|max:25|min:4',
    ]);
   	
   	  $data=array();
   	  $data['name']=$request->name;
   	  $data['slug']=$request->slug;
 	  $category = DB::table('categories')->insert($data);
   	  //echo "<pre>";
   	 // print_r($data);
   	  //return response()->json($data);
   	  if($category)
   	  {
   	  	$notification=array(
   	  		'message'=>'Successfuly Category Inserted',
   	  		'alert-type'=>'success'
   	  	);
   	  	return Redirect()->route('all.category')->with($notification);

   	  }
   	  else
   	  {

   	  	$notification=array(
   	  		'message'=>'Something went wrong',
   	  		'alert-type'=>'error'
   	  	);
   	  	return Redirect()->back()->with($notification);

   	  }
   }

   public function allcategory(){
      $category = DB::table('categories')->get();
      return view('pages/posts.all_category',compact('category'));
   }

    public function viewcategory($id){
    	$category = DB::table('categories')->where('id',$id)->first();
       // return view('pages/posts.categoryview')->with('category',$category);
    	 return view('pages/posts.categoryview',compact('category'));

    }

    public function deletecategory($id){
    	$delete = DB::table('categories')->where('id',$id)->delete();

          $notification=array(
   	  		'message'=>'Successfuly Category Deleted',
   	  		'alert-type'=>'success'
   	  	);

          return Redirect()->back()->with($notification);

    }

    public function editcategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
    	return view('pages/posts.edit_category',compact('category'));

    }

    public function updatecategory(Request $request,$id)

     {

        $validatedData = $request->validate([
        'name' => 'required|max:25|min:4',
        'slug' => 'required|max:25|min:4',
    ]);
   	
   	  $data=array();
   	  $data['name']=$request->name;
   	  $data['slug']=$request->slug;
 	  $category = DB::table('categories')->where('id',$id)->update($data);
   	  //echo "<pre>";
   	 // print_r($data);
   	  //return response()->json($data);
   	  if($category)
   	  {
   	  	$notification=array(
   	  		'message'=>'Successfuly Category Updated',
   	  		'alert-type'=>'success'
   	  	);
   	  	return Redirect()->route('all.category')->with($notification);

   	  }
   	  else
   	  {

   	  	$notification=array(
   	  		'message'=>'Nothing To Updated',
   	  		'alert-type'=>'error'
   	  	);
   	  	return Redirect()->back()->with($notification);

   	  }
   }

 
   
}
