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

        $request->validate([
        
        ]);
    
        $reports = new Report;

        $reports->records_id = $request->id;
        $reports->receipt_no = $request->receipt_no;
        $reports->fees = $request->fees;
        $reports->date = $request->date;
        $reports->description = $request->description;
    
        $reports->save();

        
       
      
        return redirect()->back();

    }
    public function show()
    {
       
    
    }
    public function edit(){
          
    }

    public function update(Request $request){
       

    
    }
    public function destroy(Request $request){
       
       

    }
}
