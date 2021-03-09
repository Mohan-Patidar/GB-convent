<?php

namespace App\Http\Controllers;
use App\Models\Student_fee;
use App\Models\Year;
use App\Models\Student_classe;
use Illuminate\Http\Request;

use Session;
class ClassController extends Controller
{
    public function index(){
        $tests = Student_fee::get();
        $year = Year::get();
        $class = Student_classe::get();
        return view('admin.class.index',compact("tests","year","class"));
    }
    public function create(){
        $tests = Student_classe::all();
        $year = Year::all();
        return view('admin.class.create',compact("tests","year"));
    }
    public function store(Request $request){

        $request->validate([
           
            
        ]);

        $tests= new Student_fee;
        $tests->years_id=$request->years_id;
        $tests->student_classes_id=$request->student_classes_id;
        $tests->amount=$request->amount;
      
        
        $tests->save();
        Session::flash('message', 'class area added successfuly!');
       
        return redirect('add_class');

    }
    public function show($id)
    {
    
       //
    
    }
    public function edit($test){
        $year = Year::all();
        $class = Student_classe::all();
        $tests = Student_fee::where("id", "=", $test)->first();
    
        return view('admin.class.edit',compact("tests","year","class"));        
    }

    public function update(Request $request ,$id){
       
        $request->validate([
            
        ]);
        $tests =Student_fee::where("id", "=", $id)->first();
       
        $tests->years_id=$request->years_id;
        $tests->student_classes_id=$request->student_classes_id;
        $tests->amount=$request->amount;
       
        $tests->update(); 
      
        Session::flash('message', ' data updated successfuly!');
        return redirect('add_class');

    }
    public function destroy(request $request){
        $id = $request->all();
        Student_fee::destroy($id);
        // Session::flash('message', ' data delete successfuly!');
       

    }
}
