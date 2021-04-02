<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        

    }
    public function create()
    {
      //
    }
    public function store(Request $request){

     
    
        $reports = new Report;
        $reports->records_id = $request->id;
        $reports->receipt_no = $request->receipt_no;
        $reports->fees = $request->fees;
        $reports->date = $request->date;
        $reports->description = $request->description;
    
        $reports->save();

        return response()->json("fees deposite");
      
        // return redirect()->back();

    }
    public function show()
    {
       
    
    }
    public function edit($post){
        
    }

    public function update(Request $request){

        $id = $request->main_id;
       
        $reports =Report::where("id", "=", $id)->first();
       
        $reports->records_id = $request->id;
        $reports->receipt_no = $request->receipt_no;
        $reports->fees = $request->fees;
        $reports->date = $request->date;
        $reports->description = $request->description;
       
        $reports->update(); 
      
        return response()->json("fees update");


    
    }
    public function destroy(Request $request){
       
       

    }
}
