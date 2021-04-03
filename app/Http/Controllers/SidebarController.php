<?php

namespace App\Http\Controllers;
use App\Models\Student_classe;
use App\Models\Record;
use App\Models\Year;
use App\Models\Student;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function YearData(Request $request,$id){
        $year= Year::get();
        $allclass= Student_classe::get(); 
        // $class = Student_classe::get();
        $tests =Record::where("session","=",$id)->get();
         foreach($year as $y){
            if($y->status==1){
                $y_name=$y->years;
                $y_id=$y->id;
            }
        }
        $b=array();
        foreach($tests as $t){
            $a=$t->students_id;
            $students = Student::where("id","=", $a)->get();
            foreach($students as $s){
                array_push($b,$s);
               }
        }

        return view('admin.sidebar.years',compact("b","tests","y_id","year","y_name","allclass"));
    }
}
