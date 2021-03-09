<?php

namespace App\Http\Controllers;
use App\Models\Student_classe;
use App\Models\Record;
use App\Models\Year;
use App\Models\Student;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
  
    public function classData($id){
        $year= Year::get();
        $class = Student_classe::get();
        $tests = Record::where("class_name","=", $id)->get();
        $b=array();
      
        foreach($tests as $t){
           $a=$t->students_id;
          
           $students = Student::where("id","=", $a)->get();
           
           foreach($students as $s){
            array_push($b,$s);
           }
           }
        
           
      
        return view('admin.sidebar.views',compact("b","tests","class","year"));
    }

    public function sessionData($id){
        $year= Year::get();
        $class = Student_classe::get();
        $tests =Record::where("session","=", $id)->get();
        $b=array();
        foreach($tests as $t){
            $a=$t->students_id;
            $students = Student::where("id","=", $a)->get();
            foreach($students as $s){
                array_push($b,$s);
               }
        }

        return view('admin.sidebar.session',compact("b","tests","class","year"));
    }
}
