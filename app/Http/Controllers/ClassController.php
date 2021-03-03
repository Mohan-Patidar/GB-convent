<?php

namespace App\Http\Controllers;
use App\Models\Gb;
use Illuminate\Http\Request;

use Session;
class ClassController extends Controller
{
    public function index(){
        $tests = Gb::get();
        return view('admin.class.index',compact("tests"));
    }
    public function create(){
        return view('admin.class.create');
    }
    public function store(Request $request){

        $request->validate([
            'class_name' => 'required',
            
        ]);

        $tests= new Gb;
        $tests->class_name=$request->class_name;
      
        
        $tests->save();
        Session::flash('message', 'class area added successfuly!');
       
        return redirect('add_class');

    }
    public function show($id)
    {
    
       //
    
    }
    public function edit($test){
       
        $tests = Gb::where("id", "=", $test)->first();
    
        return view('admin.class.edit',compact('tests'));        
    }

    public function update(Request $request ,$id){
       
        $request->validate([
            'class_name' => 'required',
        ]);
       $test =Gb::where("id", "=", $id)->first();
       $test->class_name=$request->class_name; 
        
       $test->update(); 
        Session::flash('message', ' data updated successfuly!');
        return redirect('add_class');

    }
    public function destroy(request $request){
        $id = $request->all();
        Gb::destroy($id);
        // Session::flash('message', ' data delete successfuly!');
       

    }
}
